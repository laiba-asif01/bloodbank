<?php
namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\SettingsModel;

class SettingsApi extends BaseController
{
    protected $settingsModel;

    public function __construct()
    {
        $this->settingsModel = new SettingsModel();
        helper(['form', 'url']);
    }

    // GET: /api/settings
    public function index()
    {
        $settings = $this->settingsModel->getSettings();
        return $this->response->setJSON([
            'status' => 'success',
            'settings' => $settings
        ]);
    }

    // POST: /api/settings/app
    public function saveAppSettings()
    {
        $data = [
            'app_name'        => $this->request->getPost('app_name'),
            'app_description' => $this->request->getPost('app_description'),
            'app_version'     => $this->request->getPost('app_version'),
            'app_author'      => $this->request->getPost('app_author'),
            'app_contact'     => $this->request->getPost('app_contact'),
            'app_email'       => $this->request->getPost('app_email'),
            'app_website'     => $this->request->getPost('app_website'),
            'app_developed_by'=> $this->request->getPost('app_developed_by'),
        ];

        // File upload
        $logoFile = $this->request->getFile('app_logo');
        if ($logoFile && $logoFile->isValid() && !$logoFile->hasMoved()) {
            $newName = $logoFile->getRandomName();
            $logoFile->move(ROOTPATH . 'public/uploads', $newName);
            $data['app_logo'] = 'uploads/' . $newName;
        }

        if ($this->settingsModel->saveSettings($data)) {
            return $this->respondSuccess('App settings saved successfully!');
        }
        return $this->respondError('Failed to save app settings!');
    }

    // POST: /api/settings/admob
    public function saveAdmobSettings()
    {
        $data = [
            'publisher_id'         => $this->request->getPost('publisher_id'),
            'app_id_android'       => $this->request->getPost('app_id_android'),
            'banner_ad'            => $this->request->getPost('banner_ad'),
            'banner_ad_id'         => $this->request->getPost('banner_ad_id'),
            'interstital_ad'       => $this->request->getPost('interstital_ad'),
            'interstital_ad_id'    => $this->request->getPost('interstital_ad_id'),
            'interstital_ad_click' => $this->request->getPost('interstital_ad_click')
        ];

        if ($this->settingsModel->saveSettings($data)) {
            return $this->respondSuccess('Admob settings saved successfully!');
        }
        return $this->respondError('Failed to save admob settings!');
    }

    // POST: /api/settings/notification
    public function saveNotificationSettings()
    {
        $data = [
            'onesignal_app_id'  => $this->request->getPost('onesignal_app_id'),
            'onesignal_rest_key'=> $this->request->getPost('onesignal_rest_key')
        ];

        if ($this->settingsModel->saveSettings($data)) {
            return $this->respondSuccess('Notification settings saved successfully!');
        }
        return $this->respondError('Failed to save notification settings!');
    }

    // POST: /api/settings/api-keys
    public function saveApiKeys()
    {
        $data = [
            'google_maps_api_key' => $this->request->getPost('google_maps_api_key')
        ];

        if ($this->settingsModel->saveSettings($data)) {
            return $this->respondSuccess('API keys saved successfully!');
        }
        return $this->respondError('Failed to save API keys!');
    }

    // ✅ Helper methods
    private function respondSuccess($message)
    {
        $updatedSettings = $this->settingsModel->getSettings();
        return $this->response->setJSON([
            'status' => 'success',
            'message' => $message,
            'settings' => $updatedSettings
        ]);
    }

    private function respondError($message)
    {
        return $this->response->setJSON([
            'status' => 'error',
            'message' => $message
        ]);
    }
}