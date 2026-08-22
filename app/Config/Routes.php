<?php

use CodeIgniter\Router\RouteCollection;

/**
 * @var RouteCollection $routes
 */
$routes->get('/', 'Home::index');

// ✅ Public Routes (without auth filter)
$routes->get('login', 'Auth::index');
$routes->post('login/check', 'Auth::check');
$routes->get('login/auto', 'Auth::autoLogin');
$routes->get('logout', 'Auth::logout');

//  Protected Routes (with auth filter)
$routes->get('dashboard', 'Admin::dashboard', ['filter' => 'auth']);
$routes->get('bank', 'Admin::bank', ['filter' => 'auth']);
$routes->get('test', 'Admin::test', ['filter' => 'auth']);
$routes->get('xyz', 'Admin::xyz', ['filter' => 'auth']);

// Countries
$routes->group('countries', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Countries::countries');
    $routes->get('fetch', 'Countries::fetch');
    $routes->post('store', 'Countries::store');
    $routes->get('edit/(:num)', 'Countries::edit/$1');
    $routes->get('delete/(:num)', 'Countries::delete/$1');
});

// States
$routes->group('states', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'States::states');
    $routes->get('fetch', 'States::fetch');
    $routes->post('store', 'States::store');
    $routes->get('edit/(:num)', 'States::edit/$1');
    $routes->get('delete/(:num)', 'States::delete/$1');
});

// Cities
$routes->group('cities', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Cities::cities');
    $routes->get('fetch', 'Cities::fetch');
    $routes->post('store', 'Cities::store');
    $routes->get('edit/(:num)', 'Cities::edit/$1');
    $routes->get('delete/(:num)', 'Cities::delete/$1');
    $routes->get('getStates/(:num)', 'Cities::getStates/$1');
});

// App Users
$routes->group('appusers', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'AppUsers::appusers');
    $routes->get('fetch', 'AppUsers::fetch');
    $routes->post('store', 'AppUsers::store');
    $routes->get('edit/(:num)', 'AppUsers::edit/$1');
    $routes->get('delete/(:num)', 'AppUsers::delete/$1');
    $routes->get('getStates/(:num)', 'AppUsers::getStates/$1');
    $routes->get('getCities/(:num)', 'AppUsers::getCities/$1');

    // ✅ API Routes


});

// Banks
$routes->group('banks', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'BankController::banks');
    $routes->get('fetch', 'BankController::fetch');
    $routes->post('store', 'BankController::store');
    $routes->get('edit/(:num)', 'BankController::edit/$1');
    $routes->get('delete/(:num)', 'BankController::delete/$1');
    $routes->get('getStates/(:num)', 'BankController::getStates/$1');
    $routes->get('getCities/(:num)', 'BankController::getCities/$1');
    $routes->get('view/(:num)', 'BankController::view/$1');
});

// Donors
$routes->group('donors', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'DonorController::donors');
    $routes->get('fetch', 'DonorController::fetch');
    $routes->post('store', 'DonorController::store');
    $routes->get('edit/(:num)', 'DonorController::edit/$1');
    $routes->get('delete/(:num)', 'DonorController::delete/$1');
    $routes->get('view/(:num)', 'DonorController::view/$1');
    $routes->get('getStates/(:num)', 'DonorController::getStates/$1');
    $routes->get('getCities/(:num)', 'DonorController::getCities/$1');

    $routes->get('update-all-scores', 'DonorController::updateAllScores');
});

// Requests
$routes->group('requests', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'RequestController::requests');
    $routes->get('fetch', 'RequestController::fetch');
    $routes->post('store', 'RequestController::store');
    $routes->get('edit/(:num)', 'RequestController::edit/$1');
    $routes->get('delete/(:num)', 'RequestController::delete/$1');
    $routes->get('view/(:num)', 'RequestController::view/$1');
    $routes->get('getStates/(:num)', 'RequestController::getStates/$1');
    $routes->get('getCities/(:num)', 'RequestController::getCities/$1');
});

// Blogs
$routes->group('admin', ['filter' => 'auth'], function($routes) {
    $routes->get('blogs', 'BlogController::index');
    $routes->get('addblogs', 'BlogController::create');
    $routes->post('blogs/save', 'BlogController::save');
    $routes->get('blogs/edit/(:num)', 'BlogController::edit/$1');
    $routes->post('blogs/update/(:num)', 'BlogController::update/$1');
    $routes->get('blogs/delete/(:num)', 'BlogController::delete/$1');
});

//// Settings
//$routes->get('settings', 'Admin::settings');
$routes->get('privacypolicy', 'Admin::privacypolicy');

// Settings
$routes->group('', ['filter' => 'auth'], function($routes) {
    $routes->get('settings', 'Settings::index');
    $routes->post('settings/saveAppSettings', 'Settings::saveAppSettings');
    $routes->post('settings/saveAdmobSettings', 'Settings::saveAdmobSettings');
    $routes->post('settings/saveNotificationSettings', 'Settings::saveNotificationSettings');
    $routes->post('settings/saveApiKeys', 'Settings::saveApiKeys');
});

// Notifications
$routes->group('notifications', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'Notifications::index');
    $routes->post('save', 'Notifications::save');
    $routes->get('list', 'Notifications::list');
    $routes->get('delete/(:num)', 'Notifications::delete/$1');
});

// Extra shortcut (old code compatibility)
$routes->get('notificationslist', 'Notifications::list', ['filter' => 'auth']);


// Admin Config
$routes->group('adminconfig', ['filter' => 'auth'], function($routes) {
    $routes->get('/', 'AdminConfig::index');
    $routes->post('save', 'AdminConfig::save');
});


//appusers
$routes->group('api', ['namespace' => 'App\Controllers\Api'], function($routes) {
    $routes->resource('appusersapi');
});


$routes->get('api/donorapi/filter', 'Api\DonorApi::filter');
//donors
$routes->group('api', ['namespace' => 'App\Controllers\Api'], function($routes) {
    $routes->resource('donorapi');
});
//banks
$routes->group('api', ['namespace' => 'App\Controllers\Api'], function($routes) {
    $routes->resource('bankapi');
});
//blogs
$routes->group('api', ['namespace' => 'App\Controllers\Api'], function($routes) {
    $routes->resource('blogapi');
});


// Add this route
$routes->post('api/donorapi/sendContactMessage', 'Api\DonorApi::sendContactMessage');


// ✅ Custom routes first
$routes->get('api/statesapi/byCountry/(:num)', 'Api\StatesApi::getStatesByCountry/$1');
$routes->get('api/citiesapi/byState/(:num)', 'Api\CitiesApi::getCitiesByState/$1');

//cities
$routes->group('api', ['namespace' => 'App\Controllers\Api'], function($routes) {
    $routes->resource('citiesapi');
});
//countries
$routes->group('api', ['namespace' => 'App\Controllers\Api'], function($routes) {
    $routes->resource('countriesapi');
});
//states
$routes->group('api', ['namespace' => 'App\Controllers\Api'], function($routes) {
    $routes->resource('statesapi');
});



//request
$routes->group('api', ['namespace' => 'App\Controllers\Api'], function($routes) {
    $routes->resource('requestapi');
});


//notifications
$routes->group('api', ['namespace' => 'App\Controllers\Api'], function($routes) {
    $routes->resource('notificationapi');
});


//settings
$routes->group('api', ['namespace' => 'App\Controllers\Api'], function($routes) {
    $routes->resource('settingsapi');
});


//adminconfig
$routes->group('api', ['namespace' => 'App\Controllers\Api'], function($routes) {
    $routes->resource('adminconfigapi');
});


//admin
$routes->group('api', ['namespace' => 'App\Controllers\Api'], function($routes) {
    $routes->get('dashboard', 'AdminApi::dashboard');
});


$routes->group('api', ['namespace' => 'App\Controllers\Api'], function($routes) {
    $routes->get('auth/auto-login', 'AuthApi::autoLogin');
});










//BBinterface routes
$routes->get('/', 'Admin::index');
$routes->get('/home', 'Admin::home');
$routes->get('/aboutus', 'Admin::about');
$routes->get('/blog', 'Admin::blog');
$routes->get('/donor', 'Admin::donor');
$routes->get('/contact', 'Admin::contact');
$routes->get('/applyasdonor', 'Admin::applyasdonor');
$routes->get('/test', 'Admin::test');

//$routes->get('/blogdetail', 'Admin::blogdetail');
$routes->get('/donor_profile', 'Admin::donor_profile');
$routes->post('/api/donorapi/incrementViews/(:num)', 'Api\DonorApi::incrementViews/$1');
$routes->get('donors/recalculate-scores', 'DonorController::recalculateAllScores', ['filter' => 'auth']);
$routes->get('api/top-donors', 'Api\DonorApi::topDonors');
$routes->get('api/fetch_latest', 'Api\DonorApi::fetch_latest');
$routes->get('api/blogapi', 'BlogApi::index');
$routes->get('api/blogapi/show/(:num)', 'BlogApi::show/$1');



// 🌍 Donor routes
//$routes->get('donor/getCountries', 'DonorController::getCountries');
//$routes->get('donor/getStates/(:num)', 'DonorController::getStates/$1');
//$routes->get('donor/getCities/(:num)', 'DonorController::getCities/$1');
//$routes->post('donor/store', 'DonorController::store');




//// User portal routes
//$routes->get('/userportal', 'AppUsers::userPortal');
//$routes->post('/appuser/login', 'AppUsers::login');
//$routes->post('/appuser/forgetPassword', 'AppUsers::forgetPassword');
//$routes->get('/appuser/logout', 'AppUsers::logout');
//$routes->get('user-donors/getCountries', 'DonorController::getCountries');
//$routes->get('user-donors/getStates/(:num)', 'DonorController::getStates/$1');
//$routes->get('user-donors/getCities/(:num)', 'DonorController::getCities/$1');
//$routes->get('/user-donors/user_donors/(:num)', 'DonorController::user_donors/$1');
//$routes->get('/user-donors/user_stats/(:num)', 'DonorController::user_stats/$1');
//$routes->post('/user-donors/user_store', 'DonorController::user_store');
//$routes->get('user-donors/view/(:num)', 'DonorController::view/$1');
//$routes->get('user-donors/edit/(:num)', 'DonorController::edit/$1');
//$routes->post('user-donors/delete/(:num)', 'DonorController::delete/$1');


$routes->group('user', ['filter' => 'userGuest'], function($routes) {
    $routes->get('login', 'AppUsers::loginPage');
    $routes->post('login', 'AppUsers::login');
    $routes->get('forgot-password', 'AppUsers::forgotPasswordPage');
    $routes->post('forgot-password', 'AppUsers::forgotPassword');
});

// User Logout (accessible when logged in)
$routes->get('user/logout', 'AppUsers::logout');

// =============================================
// USER PORTAL - PROTECTED ROUTES
// =============================================
$routes->group('', ['filter' => 'userAuth'], function($routes) {
    // Main Portal
    $routes->get('userportal', 'AppUsers::userPortal');

    // User Donor Management
    $routes->get('user-donors/user_donors/(:num)', 'DonorController::user_donors/$1');
    $routes->get('user-donors/user_stats/(:num)', 'DonorController::user_stats/$1');
    $routes->post('user-donors/user_store', 'DonorController::user_store');
    $routes->get('user-donors/view/(:num)', 'DonorController::view/$1');
    $routes->get('user-donors/edit/(:num)', 'DonorController::edit/$1');
    $routes->post('user-donors/delete/(:num)', 'DonorController::delete/$1');
});

// =============================================
// PUBLIC ROUTES (No authentication required)
// =============================================
$routes->get('user-donors/getCountries', 'DonorController::getCountries');
$routes->get('user-donors/getStates/(:num)', 'DonorController::getStates/$1');
$routes->get('user-donors/getCities/(:num)', 'DonorController::getCities/$1');

//// Registration page (public)
//$routes->get('registerasuser', 'AppUsers::registerPage');
//$routes->post('appuser/register', 'AppUsers::register');

//register as user

$routes->get('/registerasuser', 'Admin::registerasuser');
$routes->get('appuser/getCountries', 'AppUsers::getCountries');
$routes->get('appuser/getStates/(:num)', 'AppUsers::getStates/$1');
$routes->get('appuser/getCities/(:num)', 'AppUsers::getCities/$1');
$routes->post('appuser/store', 'AppUsers::store');


