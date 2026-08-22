<?php
namespace App\Controllers;

use App\Controllers\BaseController;
use App\Models\SettingsModel;

class Settings extends BaseController
{
    protected $settingsModel;

    public function __construct()
    {
        $this->settingsModel = new SettingsModel();
        helper(['form', 'url']);
    }

    public function index()
    {
        // Get all settings from database
        $settings = $this->settingsModel->getSettings();

        // Pass settings to view
        $data['settings'] = $settings;

        return view('adminpannel/settings', $data);
    }

    public function saveAppSettings()
    {
        $validation = \Config\Services::validation();

        $validation->setRules([
            'app_name' => 'required|min_length[3]|max_length[255]',
            'app_version' => 'required|max_length[50]',
            'app_email' => 'valid_email'
        ]);

        if (!$validation->withRequest($this->request)->run()) {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => implode(', ', $validation->getErrors())
            ]);
        }

        $data = [
            'app_name' => $this->request->getPost('app_name'),
            'app_description' => $this->request->getPost('app_description'),
            'app_version' => $this->request->getPost('app_version'),
            'app_author' => $this->request->getPost('app_author'),
            'app_contact' => $this->request->getPost('app_contact'),
            'app_email' => $this->request->getPost('app_email'),
            'app_website' => $this->request->getPost('app_website'),
            'app_developed_by' => $this->request->getPost('app_developed_by')
        ];

        // Handle file upload
        $logoFile = $this->request->getFile('app_logo');
        if ($logoFile && $logoFile->isValid() && !$logoFile->hasMoved()) {
            $newName = $logoFile->getRandomName();
            $logoFile->move(ROOTPATH . 'public/uploads', $newName);
            $data['app_logo'] = 'uploads/' . $newName;

            // Delete old logo if exists
            $oldSettings = $this->settingsModel->getSettings();
            if (!empty($oldSettings['app_logo']) && file_exists(ROOTPATH . 'public/' . $oldSettings['app_logo'])) {
                unlink(ROOTPATH . 'public/' . $oldSettings['app_logo']);
            }
        }

        // PASTE THE CODE HERE
        if ($this->settingsModel->saveSettings($data)) {
            // Get the updated settings
            $updatedSettings = $this->settingsModel->getSettings();

            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'App settings saved successfully!',
                'settings' => $updatedSettings
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to save app settings!'
            ]);
        }
    }

    public function saveAdmobSettings()
    {
        $data = [
            'publisher_id' => $this->request->getPost('publisher_id'),
            'app_id_android' => $this->request->getPost('app_id_android'),
            'banner_ad' => $this->request->getPost('banner_ad'),
            'banner_ad_id' => $this->request->getPost('banner_ad_id'),
            'interstital_ad' => $this->request->getPost('interstital_ad'),
            'interstital_ad_id' => $this->request->getPost('interstital_ad_id'),
            'interstital_ad_click' => $this->request->getPost('interstital_ad_click')
        ];

        // PASTE THE CODE HERE
        if ($this->settingsModel->saveSettings($data)) {
            // Get the updated settings
            $updatedSettings = $this->settingsModel->getSettings();

            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Admob settings saved successfully!',
                'settings' => $updatedSettings
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to save admob settings!'
            ]);
        }
    }

    public function saveNotificationSettings()
    {
        $data = [
            'onesignal_app_id' => $this->request->getPost('onesignal_app_id'),
            'onesignal_rest_key' => $this->request->getPost('onesignal_rest_key')
        ];

        // PASTE THE CODE HERE
        if ($this->settingsModel->saveSettings($data)) {
            // Get the updated settings
            $updatedSettings = $this->settingsModel->getSettings();

            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'Notification settings saved successfully!',
                'settings' => $updatedSettings
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to save notification settings!'
            ]);
        }
    }

    public function saveApiKeys()
    {
        $data = [
            'google_maps_api_key' => $this->request->getPost('google_maps_api_key')
        ];

        // PASTE THE CODE HERE
        if ($this->settingsModel->saveSettings($data)) {
            // Get the updated settings
            $updatedSettings = $this->settingsModel->getSettings();

            return $this->response->setJSON([
                'status' => 'success',
                'message' => 'API keys saved successfully!',
                'settings' => $updatedSettings
            ]);
        } else {
            return $this->response->setJSON([
                'status' => 'error',
                'message' => 'Failed to save API keys!'
            ]);
        }
    }
}