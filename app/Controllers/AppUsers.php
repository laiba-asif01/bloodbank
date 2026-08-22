<?php

namespace App\Controllers;

use App\Models\AppUserModel;
use App\Models\CountryModel;
use App\Models\StateModel;
use App\Models\CityModel;
use App\Models\SettingsModel;
use CodeIgniter\Controller;

class AppUsers extends Controller
{
    // =========================================
    // ADMIN PANEL METHODS
    // =========================================

    public function appusers()
    {
        $countryModel = new CountryModel();
        $settingsModel = new SettingsModel();

        $data = [
            'countries' => $countryModel->findAll(),
            'settings'  => $settingsModel->getSettings()
        ];

        return view('adminpannel/appusers', $data);
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
        $model = new AppUserModel();

        $data = $model
            ->select('app_users.id, reg_no, full_name, mobile, password, blood_group, status, 
                      countries.name as country_name, states.name as state_name, cities.name as city_name')
            ->join('countries', 'countries.id=app_users.country_id')
            ->join('states', 'states.id=app_users.state_id')
            ->join('cities', 'cities.id=app_users.city_id')
            ->orderBy('app_users.id', 'DESC')
            ->findAll();

        return $this->response->setJSON(['data' => $data]);
    }

    public function store()
    {
        $model = new AppUserModel();
        $id = $this->request->getPost('id');

        $mobile = $this->request->getPost('mobile');
        if (!preg_match('/^\d{11}$/', $mobile)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Mobile must be exactly 11 digits'
            ]);
        }

        $data = [
            'full_name'   => $this->request->getPost('full_name'),
            'mobile'      => $mobile,
            'country_id'  => $this->request->getPost('country_id'),
            'state_id'    => $this->request->getPost('state_id'),
            'city_id'     => $this->request->getPost('city_id'),
            'address'     => $this->request->getPost('address'),
            'latitude'    => $this->request->getPost('latitude'),
            'longitude'   => $this->request->getPost('longitude'),
            'dob'         => $this->request->getPost('dob'),
            'blood_group' => $this->request->getPost('blood_group'),
            'status'      => $this->request->getPost('status'),
        ];

        $password = $this->request->getPost('password');
        if (!empty($password)) {
            $data['password'] = $password;
        } else {
            $password = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'), 0, 8);
            $data['password'] = $password;
        }

        if ($id) {
            $model->update($id, $data);
            return $this->response->setJSON(['status' => 'success']);
        } else {
            if ($model->insert($data)) {
                $newUser = $model->find($model->getInsertID());
                return $this->response->setJSON([
                    'status' => 'success',
                    'reg_no' => $newUser['reg_no'],
                    'password' => $password
                ]);
            }
            return $this->response->setJSON(['status' => 'error', 'message' => 'Registration failed']);
        }
    }

    public function edit($id)
    {
        return $this->response->setJSON((new AppUserModel())->find($id));
    }

    public function delete($id)
    {
        (new AppUserModel())->delete($id);
        return $this->response->setJSON(['status' => 'deleted']);
    }

    // =========================================
    // USER PORTAL AUTHENTICATION METHODS
    // =========================================

    /**
     * Show login page
     */
    public function loginPage()
    {
        return view('user_portal/login');
    }

    /**
     * Handle login request
     */
    public function login()
    {
        $reg_no = $this->request->getPost('reg_no');
        $password = $this->request->getPost('password');

        // Validate input
        if (empty($reg_no) || empty($password)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Please enter both registration number and password.'
            ]);
        }

        $model = new AppUserModel();
        $user = $model->where('reg_no', $reg_no)->first();

        // Check if user exists
        if (!$user) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Registration number not found.'
            ]);
        }

        // Check password
        if ($user['password'] !== $password) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Invalid password. Please try again.'
            ]);
        }

        // Check if user is active
        if ($user['status'] !== 'Active') {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Your account has been deactivated. Please contact admin.'
            ]);
        }

        // Create session
        $session = session();
        $session->set([
            'app_user_id'     => $user['id'],
            'app_user_reg_no' => $user['reg_no'],
            'app_user_name'   => $user['full_name'],
            'app_user_mobile' => $user['mobile'],
            'app_logged_in'   => true,
            'app_login_time'  => time()
        ]);

        // Get redirect URL if exists
        $redirectUrl = $session->get('user_redirect_url') ?? base_url('userportal');
        $session->remove('user_redirect_url');

        return $this->response->setJSON([
            'status' => 'success',
            'message' => 'Login successful! Welcome ' . $user['full_name'],
            'redirect' => $redirectUrl
        ]);
    }

    /**
     * Show forgot password page
     */
    public function forgotPasswordPage()
    {
        return view('user_portal/forgot_password');
    }

    /**
     * Handle forgot password request
     */
    public function forgotPassword()
    {
        $reg_no = $this->request->getPost('reg_no');
        $mobile = $this->request->getPost('mobile');


        if (empty($reg_no) || empty($mobile)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Please enter your registration number and mobile number.'
            ]);
        }

        // Validate mobile format
        if (!preg_match('/^\d{11}$/', $mobile)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Mobile must be exactly 11 digits'
            ]);
        }

        $model = new AppUserModel();
        $user = $model->where('reg_no', $reg_no)
            ->where('mobile', $mobile)
            ->first();


        if (!$user) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'No account found with provided registration number and mobile number.'
            ]);
        }

        // Return user details
        return $this->response->setJSON([
            'status' => 'success',
            'reg_no' => $user['reg_no'],
            'name' => $user['full_name'],
            'mobile' => $user['mobile'],
            'password' => $user['password']
        ]);
    }

    /**
     * Logout user
     */
    public function logout()
    {
        $session = session();

        // Remove only user portal session data
        $session->remove([
            'app_user_id',
            'app_user_reg_no',
            'app_user_name',
            'app_user_mobile',
            'app_logged_in',
            'app_login_time',
            'user_redirect_url'
        ]);

        // Redirect to login page with success message
        return redirect()->to('/user/login')->with('success', 'You have been logged out successfully.');
    }

    /**
     * User Portal Dashboard
     */
    public function userPortal()
    {
        $session = session();
        $countryModel = new CountryModel();

        // Get user data
        $user = (new AppUserModel())->find($session->get('app_user_id'));

        return view('user_portal/userportal', [
            'user' => $user,
            'countries' => $countryModel->findAll()
        ]);
    }

    // =========================================
    // USER REGISTRATION (Public Page)
    // =========================================

    /**
     * Show registration page
     */
    public function registerPage()
    {
        $countryModel = new CountryModel();

        return view('user_portal/register', [
            'countries' => $countryModel->findAll()
        ]);
    }

    /**
     * Handle user registration
     */
    public function register()
    {
        $model = new AppUserModel();

        $mobile = $this->request->getPost('mobile');
        if (!preg_match('/^\d{11}$/', $mobile)) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Mobile must be exactly 11 digits'
            ]);
        }

        // Check if mobile already exists
        $existingUser = $model->where('mobile', $mobile)->first();
        if ($existingUser) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'This mobile number is already registered.'
            ]);
        }

        $data = [
            'full_name'   => $this->request->getPost('full_name'),
            'mobile'      => $mobile,
            'country_id'  => $this->request->getPost('country_id'),
            'state_id'    => $this->request->getPost('state_id'),
            'city_id'     => $this->request->getPost('city_id'),
            'address'     => $this->request->getPost('address'),
            'dob'         => $this->request->getPost('dob'),
            'blood_group' => $this->request->getPost('blood_group'),
            'status'      => 'Active', // Default active for new registrations
        ];

        // Generate random password
        $password = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'), 0, 8);
        $data['password'] = $password;

        if ($model->insert($data)) {
            $newUser = $model->find($model->getInsertID());
            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Registration successful!',
                'reg_no' => $newUser['reg_no'],
                'password' => $password
            ]);
        }

        return $this->response->setJSON([
            'status' => 'error',
            'message' => 'Registration failed. Please try again.'
        ]);
    }
}