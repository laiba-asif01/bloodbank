<?php
namespace App\Controllers\Api;

use App\Controllers\BaseController;
use App\Models\AppUserModel;
use App\Models\DonorModel;
use CodeIgniter\Database\Config;

class AdminApi extends BaseController
{
    public function dashboard()
    {
        $db = Config::connect();

        // Counts
        $donorsCount   = $db->table('blood_donors')->countAllResults();
        $requestsCount = $db->table('blood_requests')->countAllResults();
        $banksCount    = $db->table('banks')->countAllResults();
        $usersCount    = $db->table('app_users')->countAllResults();
        $blogsCount    = $db->table('blogs')->countAllResults();
        $contactsCount = $db->table('notifications')->countAllResults();

        // Chart Data
        $userModel  = new AppUserModel();
        $donorModel = new DonorModel();

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

        return $this->response->setJSON([
            'status'        => 'success',
            'counts'        => [
                'donors'   => $donorsCount,
                'requests' => $requestsCount,
                'banks'    => $banksCount,
                'users'    => $usersCount,
                'blogs'    => $blogsCount,
                'contacts' => $contactsCount,
            ],
            'charts'        => [
                'users'  => $finalUserData,
                'donors' => $finalDonorData,
            ],
            'recentRecords' => [
                'requests' => $recentRequests,
                'users'    => $recentUsers,
                'donors'   => $recentDonors,
            ]
        ]);
    }
}