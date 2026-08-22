<?php
namespace App\Controllers;

use App\Models\AdminCredentialModel;
use CodeIgniter\Controller;

class AdminConfig extends BaseController
{
    public function index()
    {
        $model = new AdminCredentialModel();
        $data['admin'] = $model->first(); // sirf ek hi admin hoga
        return view('adminpannel/admins/config', $data);
    }

    public function save()
    {
        $model = new AdminCredentialModel();
        $id = $this->request->getPost('id');
        $email = $this->request->getPost('email');
        $username = $this->request->getPost('username');
        $password = $this->request->getPost('password');

        $data = [
            'email' => $email,
            'username' => $username,
        ];

        // Password agar diya gaya ho to update karo
        if (!empty($password)) {
            $data['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        // File upload (logo)
        $file = $this->request->getFile('logo');
        if ($file && $file->isValid() && !$file->hasMoved()) {
            $newName = $file->getRandomName();
            $file->move('uploads/admin/', $newName);
            $data['logo'] = $newName;
        }

        if ($id) {
            $model->update($id, $data);
        } else {
            $model->insert($data);
        }

        // Session me username aur logo update kar den
        $admin = $model->first();
        session()->set([
            'username' => $admin['username'],
            'logo' => $admin['logo'] ?? null
        ]);

        return redirect()->to(base_url('adminconfig'))->with('success', 'Credentials updated successfully!');
    }

}
