<?php
namespace App\Controllers;

use CodeIgniter\Controller;

class Auth extends Controller
{
    public function index()
    {
        return view('adminpannel/auth/login');
    }

    public function check()
    {
        $session = session();
        $email = $this->request->getPost('email');
        $password = $this->request->getPost('password');

        $model = new \App\Models\AdminCredentialModel();
        $admin = $model->where('email', $email)->first();

        if ($admin && password_verify($password, $admin['password'])) {
            $session->set([
                'id'       => $admin['id'],
                'email'    => $admin['email'],
                'username' => $admin['username'],
                'logo'     => $admin['logo'] ?? null,   // ✅ Logo bhi session me save
                'logged_in'=> true
            ]);
            return redirect()->to(base_url('dashboard'));
        } else {
            $session->setFlashdata('error', 'Invalid email or password');
            return redirect()->back();
        }
    }


    public function logout()
    {
        session()->destroy();
        return redirect()->to(base_url('login'));
    }

    public function autoLogin()
    {
        $session = session();
        $model = new \App\Models\AdminCredentialModel();
        $admin = $model->first(); // sirf ek hi admin hai

        $session->set([
            'id'       => $admin['id'],
            'email'    => $admin['email'],
            'username' => $admin['username'],
            'logo'     => $admin['logo'] ?? null,   // ✅ Logo add kiya
            'logged_in'=> true
        ]);

        return redirect()->to(base_url('dashboard'));
    }


}
