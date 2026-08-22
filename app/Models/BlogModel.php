<?php
namespace App\Models;

use CodeIgniter\Model;

class BlogModel extends Model
{
    protected $table      = 'blogs';
    protected $primaryKey = 'id';
    protected $allowedFields = ['blog_title', 'blog_content', 'blog_image', 'posted_at'];
    protected $useTimestamps = false;
}