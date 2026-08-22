<?php
namespace App\Models;

use CodeIgniter\Model;

class AdminCredentialModel extends Model
{
    protected $table = 'admin_credentials';
    protected $primaryKey = 'id';
    protected $allowedFields = ['email', 'username', 'password', 'logo', 'updated_at'];
}
