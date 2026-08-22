<?php

namespace App\Models;

use CodeIgniter\Model;

class BankModel extends Model
{
    protected $table = 'banks';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'name', 'contact', 'country_id', 'state_id', 'city_id', 'address',
        'latitude', 'longitude', 'status'
    ];
}