<?php
namespace App\Controllers;
use App\Models\BankModel;
use App\Models\CountryModel;
use App\Models\StateModel;
use App\Models\CityModel;
use App\Models\SettingsModel;
use CodeIgniter\Controller;

class BankController extends Controller
{
    public function banks()
    {
        // Fetch countries to populate country dropdown
        $countryModel = new CountryModel();
        $data['countries'] = $countryModel->findAll(); // array of countries
        // ✅ fetch settings
        $settingsModel = new SettingsModel();
        $data['settings'] = $settingsModel->getSettings();
        return view('adminpannel/banks', $data); // pass to view
    }

    // Get states for selected country
    public function getStates($country_id)
    {
        $stateModel = new StateModel();
        $states = $stateModel->where('country_id', $country_id)->findAll();
        return $this->response->setJSON($states);
    }

    // Get cities for selected state
    public function getCities($state_id)
    {
        $cityModel = new CityModel();
        $cities = $cityModel->where('state_id', $state_id)->findAll();
        return $this->response->setJSON($cities);
    }


    public function fetch()
    {
        $model = new BankModel();
        $data = $model
            ->select('banks.id, banks.name, banks.contact, banks.latitude, banks.longitude, banks.status, 
              countries.name as country_name, 
              states.name as state_name, 
              cities.name as city_name')
            ->join('countries','countries.id = banks.country_id')
            ->join('states','states.id = banks.state_id')
            ->join('cities','cities.id = banks.city_id')
            ->orderBy('banks.id','DESC')
            ->findAll();

        return $this->response->setJSON(['data' => $data]);
    }

    public function store()
    {
        $model = new BankModel();
        $id = $this->request->getPost('id');

        $data = [
            'name'      => $this->request->getPost('name'),
            'contact'   => $this->request->getPost('contact'),
            'country_id'=> $this->request->getPost('country_id'),
            'state_id'  => $this->request->getPost('state_id'),
            'city_id'   => $this->request->getPost('city_id'),
            'address'   => $this->request->getPost('address'),
            'latitude'  => $this->request->getPost('latitude'),
            'longitude' => $this->request->getPost('longitude'),
            'status'    => $this->request->getPost('status'),
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
        $model = new BankModel();
        $data = $model->find($id);

        return $this->response->setJSON($data);
    }


    // Delete
    public function delete($id)
    {
        $model = new BankModel();
        $model->delete($id);
        return $this->response->setJSON(['status'=>'deleted']);
    }

    public function view($id)
    {
        $model = new BankModel();

        $data = $model
            ->select('banks.*, 
                  countries.name as country_name, 
                  states.name as state_name, 
                  cities.name as city_name')
            ->join('countries','countries.id = banks.country_id','left')
            ->join('states','states.id = banks.state_id','left')
            ->join('cities','cities.id = banks.city_id','left')
            ->find($id);

        return $this->response->setJSON($data);
    }


}