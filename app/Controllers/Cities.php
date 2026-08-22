<?php
namespace App\Controllers;
use App\Models\CityModel;
use App\Models\SettingsModel;
use App\Models\StateModel;
use App\Models\CountryModel;
use CodeIgniter\Controller;

class Cities extends Controller
{
    public function cities()
    {
        $countryModel = new CountryModel();
        $data['countries'] = $countryModel->findAll();
        // ✅ fetch settings
        $settingsModel = new SettingsModel();
        $data['settings'] = $settingsModel->getSettings();
        return view('adminpannel/cities', $data);
    }

    public function getStates($country_id)
    {
        $stateModel = new StateModel();
        $states = $stateModel->where('country_id', $country_id)->findAll();
        return $this->response->setJSON($states);
    }

    public function fetch()
    {
        $model = new CityModel();
        $data = $model->join('states','states.id=cities.state_id')
            ->join('countries','countries.id=states.country_id')
            ->select('cities.id,cities.name,cities.state_id,states.name as state_name,countries.name as country_name,countries.id as country_id')
            ->findAll();
        return $this->response->setJSON(['data'=>$data]);
    }

    public function store()
    {
        $model = new CityModel();
        $id = $this->request->getPost('id');
        $data = [
            'state_id'=>$this->request->getPost('state_id'),
            'name'=>$this->request->getPost('name')
        ];
        if($id) $model->update($id,$data);
        else $model->insert($data);
        return $this->response->setJSON(['status'=>'success']);
    }

    public function edit($id)
    {
        $model = new CityModel();
        $data = $model->find($id);
        // Include country_id for dropdowns
        $stateModel = new StateModel();
        $state = $stateModel->find($data['state_id']);
        $data['country_id'] = $state['country_id'];
        return $this->response->setJSON($data);
    }

    public function delete($id)
    {
        $model = new CityModel();
        $model->delete($id);
        return $this->response->setJSON(['status'=>'deleted']);
    }
}