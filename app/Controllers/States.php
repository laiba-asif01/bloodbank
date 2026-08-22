<?php
namespace App\Controllers;
use App\Models\SettingsModel;
use App\Models\StateModel;
use App\Models\CountryModel;
use CodeIgniter\Controller;

class States extends Controller
{
    public function states()
    {
        $countryModel = new CountryModel();
        $data['countries'] = $countryModel->findAll();
        // ✅ fetch settings
        $settingsModel = new SettingsModel();
        $data['settings'] = $settingsModel->getSettings();
        return view('adminpannel/states', $data);
    }

    public function fetch()
    {
        $model = new StateModel();
        $data = $model->join('countries', 'countries.id = states.country_id')
            ->select('states.id, states.name, states.country_id, countries.name as country_name')
            ->findAll();
        return $this->response->setJSON(['data' => $data]);
    }

    public function store()
    {
        $model = new StateModel();
        $id = $this->request->getPost('id');

        $data = [
            'country_id' => $this->request->getPost('country_id'),
            'name'       => $this->request->getPost('name'),
        ];

        if ($id) {
            $model->update($id, $data);
        } else {
            $model->insert($data);
        }

        return $this->response->setJSON(['status' => 'success']);
    }

    public function delete($id)
    {
        $model = new StateModel();
        $model->delete($id);
        return $this->response->setJSON(['status' => 'deleted']);
    }

    public function edit($id)
    {
        $model = new StateModel();
        $data = $model->find($id);
        return $this->response->setJSON($data);
    }
}