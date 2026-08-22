<?php
namespace App\Models;

use CodeIgniter\Model;

class AppUserModel extends Model
{
    protected $table = 'app_users';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'full_name', 'mobile', 'country_id', 'state_id', 'city_id', 'address',
        'latitude', 'longitude', 'dob', 'blood_group', 'status', 'password', 'reg_no'
    ];

    protected $beforeInsert = ['generateRegNo'];

    protected function generateRegNo(array $data)
    {
        // Get the last registration number
        $lastUser = $this->orderBy('id', 'DESC')->first();

        if ($lastUser && !empty($lastUser['reg_no'])) {
            // Extract number from last reg_no (format: user_01, user_02, etc.)
            preg_match('/user_(\d+)/', $lastUser['reg_no'], $matches);
            $lastNumber = isset($matches[1]) ? (int)$matches[1] : 0;
            $newNumber = $lastNumber + 1;
        } else {
            $newNumber = 1;
        }

        // Format as user_01, user_02, etc.
        $data['data']['reg_no'] = 'user_' . str_pad($newNumber, 2, '0', STR_PAD_LEFT);

        return $data;
    }

    // Auto-generate password if empty (plain text)
    public function beforeInsert(array $data)
    {
        $data = $this->generateRegNo($data);

        // If password is empty, generate a random one (plain text)
        if (empty($data['data']['password'])) {
            $data['data']['password'] = substr(str_shuffle('0123456789ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz'), 0, 8);
        }

        return $data;
    }
}