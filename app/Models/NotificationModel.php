<?php

namespace App\Models;

use CodeIgniter\Model;

class NotificationModel extends Model
{
    protected $table = 'notifications';
    protected $primaryKey = 'id';

    protected $allowedFields = [
        'notification_title',
        'external_link',
        'notification_msg',
        'big_picture',
        'created_at'
    ];

    protected $useTimestamps = false;
}