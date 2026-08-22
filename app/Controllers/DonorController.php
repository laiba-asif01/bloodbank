<?php

namespace App\Controllers;

use App\Models\DonorModel;
use App\Models\CountryModel;
use App\Models\StateModel;
use App\Models\CityModel;
use App\Models\SettingsModel;
use CodeIgniter\Controller;

class DonorController extends Controller
{
    public function donors()
    {
        $countryModel = new CountryModel();
        $settingsModel = new SettingsModel();

        $data = [
            'countries' => $countryModel->findAll(),
            'settings' => $settingsModel->getSettings()
        ];

        return view('adminpannel/donors', $data);
    }

    public function getCountries()
    {
        return $this->response->setJSON((new CountryModel())->findAll());
    }

    public function getStates($country_id)
    {
        $stateModel = new StateModel();
        $states = $stateModel->where('country_id', $country_id)->findAll();
        return $this->response->setJSON($states);
    }

    public function getCities($state_id)
    {
        $cityModel = new CityModel();
        $cities = $cityModel->where('state_id', $state_id)->findAll();
        return $this->response->setJSON($cities);
    }

    public function fetch()
    {
        $model = new DonorModel();
        $data = $model
            ->select('blood_donors.*, 
                      countries.name as country_name, 
                      states.name as state_name, 
                      cities.name as city_name,
                      app_users.full_name as added_by_name,
                      app_users.reg_no as added_by_reg_no')
            ->join('countries', 'countries.id = blood_donors.country_id', 'left')
            ->join('states', 'states.id = blood_donors.state_id', 'left')
            ->join('cities', 'cities.id = blood_donors.city_id', 'left')
            ->join('app_users', 'app_users.id = blood_donors.user_id', 'left')
            ->orderBy('blood_donors.id', 'DESC')
            ->findAll();

        return $this->response->setJSON(['data' => $data]);
    }

    // NEW: Get donors added by specific user
    public function user_donors($user_id = null)
    {
        $model = new DonorModel();

        // If no user_id provided, use logged-in user
        if (!$user_id && session()->get('app_logged_in')) {
            $user_id = session()->get('app_user_id');
        }

        if (!$user_id) {
            return $this->response->setJSON(['data' => []]);
        }

        $data = $model
            ->select('blood_donors.*, 
                      countries.name as country_name, 
                      states.name as state_name, 
                      cities.name as city_name')
            ->join('countries', 'countries.id = blood_donors.country_id', 'left')
            ->join('states', 'states.id = blood_donors.state_id', 'left')
            ->join('cities', 'cities.id = blood_donors.city_id', 'left')
            ->where('blood_donors.user_id', $user_id)
            ->orderBy('blood_donors.id', 'DESC')
            ->findAll();

        return $this->response->setJSON(['data' => $data]);
    }

    // NEW: Get user statistics
    public function user_stats($user_id = null)
    {
        $model = new DonorModel();

        // If no user_id provided, use logged-in user
        if (!$user_id && session()->get('app_logged_in')) {
            $user_id = session()->get('app_user_id');
        }

        if (!$user_id) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'User not found'
            ]);
        }

        // Get all donors for this user
        $donors = $model->where('user_id', $user_id)->findAll();

        $total_donors = count($donors);
        $active_donors = 0;
        $total_points = 0;
        $total_score = 0;

        foreach ($donors as $donor) {
            if ($donor['status'] === 'Active') {
                $active_donors++;
            }
            $total_points += (int)$donor['points'];
            $total_score += (int)$donor['donation_score'];
        }

        $avg_score = $total_donors > 0 ? $total_score / $total_donors : 0;

        return $this->response->setJSON([
            'status' => 'success',
            'data' => [
                'total_donors' => $total_donors,
                'active_donors' => $active_donors,
                'total_points' => $total_points,
                'avg_score' => $avg_score
            ]
        ]);
    }

    // ORIGINAL store method (for admin)
    public function store()
    {
        $model = new DonorModel();
        $id = $this->request->getPost('id');

        // Check donation eligibility (3 months)
        $lastDonation = $this->request->getPost('last_donation_date');
        if ($lastDonation) {
            $threeMonthsAgo = date('Y-m-d', strtotime('-3 months'));
            if ($lastDonation > $threeMonthsAgo) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Donor not eligible yet. Must wait 3 months.'
                ]);
            }
        }

        $data = [
            'full_name' => $this->request->getPost('full_name'),
            'mobile' => $this->request->getPost('mobile'),
            'country_id' => $this->request->getPost('country_id'),
            'state_id' => $this->request->getPost('state_id'),
            'city_id' => $this->request->getPost('city_id'),
            'address' => $this->request->getPost('address'),
            'latitude' => $this->request->getPost('latitude'),
            'longitude' => $this->request->getPost('longitude'),
            'habits' => $this->request->getPost('habits'),
            'last_donation_date' => $lastDonation,
            'dob' => $this->request->getPost('dob'),
            'blood_group' => $this->request->getPost('blood_group'),
            'points' => $this->request->getPost('points'),
            'donor_type' => $this->request->getPost('donor_type'),
            'gender' => $this->request->getPost('gender'),
            'status' => $this->request->getPost('status')
        ];

        // For admin, user_id might be provided or null
        $user_id = $this->request->getPost('user_id');
        if ($user_id) {
            $data['user_id'] = $user_id;
        }

        if ($id) {
            $model->update($id, $data);
        } else {
            $model->insert($data);
        }

        return $this->response->setJSON(['status' => 'success']);
    }

    public function user_store()
    {
        // Check if user is logged in
        if (!session()->get('app_logged_in')) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Please login first to add donors.'
            ]);
        }

        $model = new DonorModel();
        $id = $this->request->getPost('id');
        $userId = session()->get('app_user_id');

        // For editing: check if donor belongs to user
        if ($id) {
            $existingDonor = $model->find($id);
            if (!$existingDonor || $existingDonor['user_id'] != $userId) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'You can only edit donors added by you.'
                ]);
            }
        }

        // Get last donation date - convert empty string to NULL
        $lastDonation = $this->request->getPost('last_donation_date');

        // If the field is empty, set it to NULL instead of empty string
        if (empty($lastDonation) || $lastDonation == '') {
            $lastDonation = null;
        }

        // Check donation eligibility only if date is provided
        if ($lastDonation) {
            $threeMonthsAgo = date('Y-m-d', strtotime('-3 months'));
            if ($lastDonation > $threeMonthsAgo) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Donor not eligible yet. Must wait 3 months.'
                ]);
            }
        }

        $data = [
            'user_id' => $userId, // Always set user_id for user-added donors
            'full_name' => $this->request->getPost('full_name'),
            'mobile' => $this->request->getPost('mobile'),
            'country_id' => $this->request->getPost('country_id'),
            'state_id' => $this->request->getPost('state_id'),
            'city_id' => $this->request->getPost('city_id'),
            'address' => $this->request->getPost('address'),
            'latitude' => $this->request->getPost('latitude'),
            'longitude' => $this->request->getPost('longitude'),
            'habits' => $this->request->getPost('habits'),
            'last_donation_date' => $lastDonation, // This will be NULL if empty
            'dob' => $this->request->getPost('dob'),
            'blood_group' => $this->request->getPost('blood_group'),
            'points' => $this->request->getPost('points'),
            'donor_type' => 'Free', // Default for user-added donors
            'gender' => $this->request->getPost('gender'),
            'status' => 'Active' // Default status for user-added donors
        ];

        if ($id) {
            $model->update($id, $data);
        } else {
            $model->insert($data);
        }

        return $this->response->setJSON(['status' => 'success']);
    }

    public function edit($id)
    {
        $donor = (new DonorModel())->find($id);

        // For users: check if they own this donor
        if (session()->get('app_logged_in')) {
            $userId = session()->get('app_user_id');
            if ($donor['user_id'] != $userId) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'Access denied'
                ]);
            }
        }

        return $this->response->setJSON($donor);
    }

    public function delete($id)
    {
        $model = new DonorModel();
        $donor = $model->find($id);

        if (!$donor) {
            return $this->response->setJSON(['status' => 'error', 'message' => 'Donor not found']);
        }

        // Check ownership for users
        if (session()->get('app_logged_in')) {
            $userId = session()->get('app_user_id');
            if ($donor['user_id'] != $userId) {
                return $this->response->setJSON([
                    'status' => 'error',
                    'message' => 'You can only delete donors added by you.'
                ]);
            }
        }

        // Check ownership for admin (if logged in as admin)
        if (session()->get('logged_in') && !session()->get('app_logged_in')) {
            // Admin can delete any donor
        }

        if ($model->delete($id)) {
            return $this->response->setJSON(['status' => 'deleted', 'message' => 'Donor deleted successfully']);
        }

        return $this->response->setJSON(['status' => 'error', 'message' => 'Failed to delete donor']);
    }

    public function view($id)
    {
        $model = new DonorModel();
        $data = $model
            ->select('blood_donors.*, 
                      countries.name as country_name, 
                      states.name as state_name, 
                      cities.name as city_name,
                      app_users.full_name as added_by_name,
                      app_users.reg_no as added_by_reg_no,
                      app_users.mobile as added_by_mobile')
            ->join('countries', 'countries.id = blood_donors.country_id', 'left')
            ->join('states', 'states.id = blood_donors.state_id', 'left')
            ->join('cities', 'cities.id = blood_donors.city_id', 'left')
            ->join('app_users', 'app_users.id = blood_donors.user_id', 'left')
            ->find($id);

        return $this->response->setJSON($data);
    }

    public function updateAllScores()
    {
        $model = new DonorModel();
        $donors = $model->findAll();

        $updated = 0;
        foreach ($donors as $donor) {
            $newScore = $model->calculateDonationScore($donor);
            if ($donor['donation_score'] != $newScore) {
                $model->update($donor['id'], ['donation_score' => $newScore]);
                $updated++;
            }
        }

        return $this->response->setJSON([
            'status' => 'success',
            'message' => "$updated donors ke scores update ho gaye!"
        ]);
    }
}