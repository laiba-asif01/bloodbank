<?php
namespace App\Models;
use CodeIgniter\Model;

class requestModel extends Model
{
    protected $table = 'blood_requests';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'full_name','mobile','country_id','state_id','city_id',
        'hospital','latitude','longitude','bags','blood_group','message','status'
    ];
}
