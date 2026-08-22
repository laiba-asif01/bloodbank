<?php
namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\AdminCredentialModel;

class AuthApi extends ResourceController
{
    protected $format = 'json';

    // Login API
    public function login()
    {
        $email    = $this->request->getVar('email');
        $password = $this->request->getVar('password');

        $model = new AdminCredentialModel();
        $admin = $model->where('email', $email)->first();

        if ($admin && password_verify($password, $admin['password'])) {
            $session = session();
            $session->set([
                'id'       => $admin['id'],
                'email'    => $admin['email'],
                'username' => $admin['username'],
                'logo'     => $admin['logo'] ?? null,
                'logged_in'=> true
            ]);

            return $this->respond([
                'status'  => 'success',
                'message' => 'Login successful',
                'data'    => [
                    'id'       => $admin['id'],
                    'email'    => $admin['email'],
                    'username' => $admin['username'],
                    'logo'     => $admin['logo'] ?? null,
                ]
            ], 200);
        }

        return $this->respond([
            'status'  => 'error',
            'message' => 'Invalid email or password'
        ], 401);
    }

    //  Logout API
    public function logout()
    {
        session()->destroy();
        return $this->respond([
            'status'  => 'success',
            'message' => 'Logged out successfully'
        ], 200);
    }

    //  Auto login (sirf testing/demo ke liye)
    public function autoLogin()
    {
        $model = new AdminCredentialModel();
        $admin = $model->first();

        if ($admin) {
            $session = session();
            $session->set([
                'id'       => $admin['id'],
                'email'    => $admin['email'],
                'username' => $admin['username'],
                'logo'     => $admin['logo'] ?? null,
                'logged_in'=> true
            ]);

            return $this->respond([
                'status'  => 'success',
                'message' => 'Auto login successful',
                'data'    => $admin
            ], 200);
        }

        return $this->respond([
            'status'  => 'error',
            'message' => 'No admin found'
        ], 404);
    }
}