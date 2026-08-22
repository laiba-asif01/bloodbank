<?php
namespace App\Controllers;
use App\Models\CountryModel;
use App\Models\SettingsModel;
use CodeIgniter\Controller;

class Countries extends Controller
{
    // Page load
    public function countries()
    {
        $settingsModel = new SettingsModel();
        $data['settings'] = $settingsModel->getSettings();

        return view('adminpannel/countries', $data); // ✅ ab settings view me jayengi
    }


    // Fetch all countries
    public function fetch()
    {
        $model = new CountryModel();
        $data = $model->findAll();
        return $this->response->setJSON(['data' => $data]);
    }

    // Store (Insert/Update)
    public function store()
    {
        $model = new CountryModel();
        $id = $this->request->getPost('id');

        $data = [
            'name'       => $this->request->getPost('name'),
            'short_code' => $this->request->getPost('short_code'),
            'phone_code' => $this->request->getPost('phone_code'),
        ];

        if ($id) {
            $model->update($id, $data);
        } else {
            $model->insert($data);
        }

        return $this->response->setJSON(['status' => 'success']);
    }

    // Delete
    public function delete($id)
    {
        $model = new CountryModel();
        $model->delete($id);
        return $this->response->setJSON(['status' => 'deleted']);
    }

    // Fetch single record for edit
    public function edit($id)
    {
        $model = new CountryModel();
        $data = $model->find($id);
        return $this->response->setJSON($data);
    }
}