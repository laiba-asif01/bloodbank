<?php

// Turn on error reporting to catch the exact crash reason in Vercel logs
error_reporting(E_ALL);
ini_set('display_errors', '1');

// 1. Temporary writable path for serverless environment
$tmpDir = '/tmp/ci4_writable';
if (!is_dir($tmpDir)) {
    @mkdir($tmpDir, 0777, true);
    @mkdir($tmpDir . '/cache', 0777, true);
    @mkdir($tmpDir . '/logs', 0777, true);
    @mkdir($tmpDir . '/session', 0777, true);
}
define('WRITEPATH', $tmpDir . '/');

// 2. Map Database Environment Variables
$_SERVER['database.default.hostname'] = $_ENV['database_default_hostname'] ?? getenv('database_default_hostname');
$_SERVER['database.default.database'] = $_ENV['database_default_database'] ?? getenv('database_default_database');
$_SERVER['database.default.username'] = $_ENV['database_default_username'] ?? getenv('database_default_username');
$_SERVER['database.default.password'] = $_ENV['database_default_password'] ?? getenv('database_default_password');
$_SERVER['database.default.port']     = $_ENV['database_default_port']     ?? getenv('database_default_port');
$_SERVER['database.default.DBDriver'] = $_ENV['database_default_DBDriver'] ?? getenv('database_default_DBDriver');

$_SERVER['CI_ENVIRONMENT'] = 'production';

// 3. Forward to public index.php safely
require __DIR__ . '/../public/index.php';