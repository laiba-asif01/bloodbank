<?php
namespace App\Controllers;

use App\Models\AppUserModel;
use App\Models\DonorModel;

class Admin extends BaseController
{

    // Controller mein
    public function dashboard()
    {
        $db = \Config\Database::connect();

        // Counts
        $donorsCount   = $db->table('blood_donors')->countAllResults();
        $requestsCount = $db->table('blood_requests')->countAllResults();
        $banksCount    = $db->table('banks')->countAllResults();
        $usersCount    = $db->table('app_users')->countAllResults();
        $blogsCount    = $db->table('blogs')->countAllResults();
        $contactsCount = $db->table('notifications')->countAllResults();

        // Chart Data
        $userModel  = new \App\Models\AppUserModel();
        $donorModel = new \App\Models\DonorModel();

        $startDate = date('Y-m-01', strtotime('-5 months'));
        $endDate   = date('Y-m-t');

        // Last 6 months loop
        $months = [];
        for ($i = 5; $i >= 0; $i--) {
            $key = date('Y-m', strtotime("-$i months"));
            $months[$key] = [
                'month' => date('M', strtotime($key . '-01')),
                'count' => 0
            ];
        }

        // Users chart
        $userData = $userModel->select("DATE_FORMAT(created_at, '%Y-%m') as ym, COUNT(*) as count")
            ->where('created_at >=', $startDate)
            ->where('created_at <=', $endDate)
            ->groupBy('ym')
            ->orderBy('ym', 'ASC')
            ->findAll();

        foreach ($userData as $row) {
            if (isset($months[$row['ym']])) {
                $months[$row['ym']]['count'] = (int) $row['count'];
            }
        }
        $finalUserData = array_values($months);

        // Donors chart
        $monthsDonor = $months;
        $donorData = $donorModel->select("DATE_FORMAT(created_at, '%Y-%m') as ym, COUNT(*) as count")
            ->where('created_at >=', $startDate)
            ->where('created_at <=', $endDate)
            ->groupBy('ym')
            ->orderBy('ym', 'ASC')
            ->findAll();

        foreach ($donorData as $row) {
            if (isset($monthsDonor[$row['ym']])) {
                $monthsDonor[$row['ym']]['count'] = (int) $row['count'];
            }
        }
        $finalDonorData = array_values($monthsDonor);

        // Recent Records
        $recentRequests = $db->query("SELECT * FROM blood_requests ORDER BY id DESC LIMIT 10")->getResult();
        $recentUsers    = $db->query("SELECT * FROM app_users ORDER BY id DESC LIMIT 10")->getResult();
        $recentDonors   = $db->query("SELECT * FROM blood_donors ORDER BY id DESC LIMIT 10")->getResult();

        $data = [
            'donorsCount'   => $donorsCount,
            'requestsCount' => $requestsCount,
            'banksCount'    => $banksCount,
            'usersCount'    => $usersCount,
            'blogsCount'    => $blogsCount,
            'contactsCount' => $contactsCount,

            'userChartData'  => $finalUserData,
            'donorChartData' => $finalDonorData,

            'recentRequests' => $recentRequests,
            'recentUsers'    => $recentUsers,
            'recentDonors'   => $recentDonors
        ];

        return view('adminpannel/dashboard', $data);
    }



    public function settings()
    {
        return view('adminpannel/settings');
    }
    public function privacypolicy()
    {
        return view('adminpannel/privacy_policy');
    }






//    BBinterface admin
    public function home()
    {
        return view('interface/home');
    }

    public function about()
    {
        return view('interface/aboutus');
    }

    public function donor()
    {
        return view('interface/donor');
    }

    public function blog()
    {
        return view('interface/blog');
    }

    public function applyasdonor()
    {
        return view('interface/applyasdonor');
    }



    public function contact()
    {
        return view('interface/contact');
    }

    public function test()
    {
        return view('interface/test');
    }


    public function donor_profile()
    {
        return view('interface/donor_profile');
    }

    public function blogdetail()
    {
        return view('interface/blogdetail');
    }

        public function registerasuser()
    {
        return view('interface/registerasuser');
    }


}