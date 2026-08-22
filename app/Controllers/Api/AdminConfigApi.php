<?php
namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\AdminCredentialModel;

class AdminConfigApi extends BaseController
{
    protected $model;

    public function __construct()
    {
        $this->model = new AdminCredentialModel();
        helper(['form', 'url']);
    }

    // GET: /api/adminconfig
    public function index()
    {
        $admin = $this->model->first();
        return $this->response->setJSON([
            'status' => 'success',
            'admin'  => $admin ?? []
        ]);
    }

    // POST: /api/adminconfig/save
    public function save()
    {
        $id       = $this->request->getPost('id');
        $email    = $this->request->getPost('email');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $data = [
            'email'    => $email,
            'username' => $username,
        ];

        // Agar password diya gaya hai
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        // File upload (logo)
        $file = $this->request->getFile('logo');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move(ROOTPATH . 'public/uploads/admin/', $newName);
            $data['logo'] = $newName;
        }

        // Insert or Update
        if ($id) {
            $this->model->update($id, $data);
        } else {
            $this->model->insert($data);
        }

        $admin = $this->model->first();

        return $this->response->setJSON([
            'status'  => 'success',
            'message' => 'Admin credentials updated successfully!',
            'admin'   => $admin
        ]);
    }
}