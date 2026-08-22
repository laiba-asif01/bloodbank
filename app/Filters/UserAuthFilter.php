<?php

namespace App\Filters;

use CodeIgniter\HTTP\RequestInterface;
use CodeIgniter\HTTP\ResponseInterface;
use CodeIgniter\Filters\FilterInterface;

class UserAuthFilter implements FilterInterface
{
    public function before(RequestInterface $request, $arguments = null)
    {
        $session = session();

        // Check if user is logged in to user portal
        if (!$session->get('app_logged_in')) {
            // Store the intended URL for redirect after login
            $session->set('user_redirect_url', current_url());

            // Redirect to user login page
            return redirect()->to('/user/login')->with('error', 'Please login to access the portal.');
        }

        // Check session timeout (15 minutes = 900 seconds)
        $loginTime = $session->get('app_login_time');
        if ($loginTime && (time() - $loginTime) > 900) {
            // Session expired
            $session->destroy();
            return redirect()->to('/user/login')->with('error', 'Session expired. Please login again.');
        }

        // Update last activity time
        $session->set('app_last_activity', time());

        // Check if user session is valid (optional - verify user still exists)
        $userId = $session->get('app_user_id');
        if ($userId) {
            $userModel = new \App\Models\AppUserModel();
            $user = $userModel->find($userId);

            if (!$user) {
                // User no longer exists, destroy session
                $session->destroy();
                return redirect()->to('/user/login')->with('error', 'Session expired. Please login again.');
            }

            // Check if user is still active
            if ($user['status'] !== 'Active') {
                $session->destroy();
                return redirect()->to('/user/login')->with('error', 'Your account has been deactivated.');
            }
        }
    }

    public function after(RequestInterface $request, ResponseInterface $response, $arguments = null)
    {
        // Do nothing after
    }
}