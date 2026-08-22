<?php
namespace App\Models;

use CodeIgniter\Model;

class SettingsModel extends Model
{
    protected $table = 'settings';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'app_name', 'app_logo', 'app_description', 'app_version',
        'app_author', 'app_contact', 'app_email', 'app_website',
        'app_developed_by', 'publisher_id', 'app_id_android',
        'banner_ad', 'banner_ad_id', 'interstital_ad',
        'interstital_ad_id', 'interstital_ad_click',
        'onesignal_app_id', 'onesignal_rest_key', 'google_maps_api_key'
    ];

    protected $returnType = 'array';

    public function getSettings()
    {
        $settings = $this->first();
        return $settings ? $settings : [];
    }

    public function saveSettings($data)
    {
        $existing = $this->first();

        if ($existing) {
            return $this->update($existing['id'], $data);
        } else {
            return $this->insert($data);
        }
    }
}