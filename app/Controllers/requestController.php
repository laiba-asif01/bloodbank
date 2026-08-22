<?php
namespace App\Controllers;
use App\Models\requestModel;
use App\Models\CountryModel;
use App\Models\StateModel;
use App\Models\CityModel;
use App\Models\SettingsModel;
use CodeIgniter\Controller;

class requestController extends Controller
{
    public function requests()
    {
        $countryModel = new CountryModel();
        $data['countries'] = $countryModel->findAll();
        // ✅ fetch settings
        $settingsModel = new SettingsModel();
        $data['settings'] = $settingsModel->getSettings();
        return view('adminpannel/requests', $data);
    }

    public function getStates($country_id)
    {
        $stateModel = new StateModel();
        return $this->response->setJSON(
            $stateModel->where('country_id',$country_id)->findAll()
        );
    }

    public function getCities($state_id)
    {
        $cityModel = new CityModel();
        return $this->response->setJSON(
            $cityModel->where('state_id',$state_id)->findAll()
        );
    }

    public function fetch()
    {
        $model = new requestModel();
        $data = $model
            ->select('blood_requests.*, 
                  countries.name as country_name, 
                  states.name as state_name, 
                  cities.name as city_name')
            ->join('countries','countries.id = blood_requests.country_id','left')
            ->join('states','states.id = blood_requests.state_id','left')
            ->join('cities','cities.id = blood_requests.city_id','left')
            ->orderBy('blood_requests.id','DESC')
            ->findAll();

        return $this->response->setJSON(['data'=>$data]);
    }


    public function store()
    {
        $model = new requestModel();
        $id = $this->request->getPost('id');

        $data = [
            'full_name'   => $this->request->getPost('full_name'),
            'mobile'      => $this->request->getPost('mobile'),
            'blood_group' => $this->request->getPost('blood_group'),
            'message'     => $this->request->getPost('message'),
            'bags'        => $this->request->getPost('bags'),
            'country_id'  => $this->request->getPost('country_id'),
            'state_id'    => $this->request->getPost('state_id'),
            'city_id'     => $this->request->getPost('city_id'),
            'hospital'    => $this->request->getPost('hospital'),
            'latitude'    => $this->request->getPost('latitude'),
            'longitude'   => $this->request->getPost('longitude'),
            'status'      => $this->request->getPost('status'),
        ];

        if ($id) {
            // Update
            $model->update($id, $data);
            return $this->response->setJSON(['status' => 'success', 'message' => 'Updated successfully']);
        } else {
            // Insert
            $model->insert($data);
            return $this->response->setJSON(['status' => 'success', 'message' => 'Added successfully']);
        }
    }


    public function edit($id)
    {
        return $this->response->setJSON((new requestModel())->find($id));
    }

    public function delete($id)
    {
        (new requestModel())->delete($id);
        return $this->response->setJSON(['status'=>'deleted']);
    }

    public function view($id)
    {
        $model = new requestModel();
        $data = $model
            ->select('blood_requests.*, 
                  countries.name as country_name, 
                  states.name as state_name, 
                  cities.name as city_name')
            ->join('countries','countries.id = blood_requests.country_id','left')
            ->join('states','states.id = blood_requests.state_id','left')
            ->join('cities','cities.id = blood_requests.city_id','left')
            ->find($id);

        return $this->response->setJSON($data);
    }

}
