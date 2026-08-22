<?php
namespace App\Models;

use CodeIgniter\Model;

class DonorModel extends Model
{
    protected $table = 'blood_donors';
    protected $primaryKey = 'id';
    protected $allowedFields = [
        'user_id', // Add this
        'full_name', 'mobile', 'country_id', 'state_id', 'city_id',
        'address', 'latitude', 'longitude', 'habits', 'last_donation_date',
        'donation_score', 'dob', 'blood_group', 'donor_type', 'gender', 'points', 'views', 'status'
    ];

    // Calculate donation score automatically
    public function calculateDonationScore($donorData)
    {
        // If donor is inactive, return 0
        if (isset($donorData['status']) && $donorData['status'] === 'Inactive') {
            return 0;
        }

        $score = 0;

        // 1. Points contribution (40% weight)
        $points = intval($donorData['points'] ?? 0);
        $pointsScore = min($points * 2, 40);
        $score += $pointsScore;

        // 2. Views contribution (30% weight)
        $views = intval($donorData['views'] ?? 0);
        $viewsScore = min(($views / 100) * 30, 30);
        $score += $viewsScore;

        // 3. Last donation recency (30% weight)
        $lastDonationDate = $donorData['last_donation_date'] ?? null;
        if ($lastDonationDate) {
            $lastDonation = strtotime($lastDonationDate);
            $currentTime = time();
            $monthsSinceLastDonation = max(0, ($currentTime - $lastDonation) / (30 * 24 * 60 * 60));

            if ($monthsSinceLastDonation <= 3) {
                $recencyScore = 30;
            } elseif ($monthsSinceLastDonation <= 6) {
                $recencyScore = 20;
            } elseif ($monthsSinceLastDonation <= 12) {
                $recencyScore = 10;
            } else {
                $recencyScore = 5;
            }
        } else {
            $recencyScore = 2;
        }

        $score += $recencyScore;

        return min(max(round($score), 0), 100);
    }

    // Override insert and update methods
    public function insert($data = null, bool $returnID = true)
    {
        if (is_array($data)) {
            $data['donation_score'] = $this->calculateDonationScore($data);
        }
        return parent::insert($data, $returnID);
    }

    public function update($id = null, $data = null): bool
    {
        if (is_array($data)) {
            $currentData = $this->find($id);
            if ($currentData) {
                $mergedData = array_merge($currentData, $data);
                $data['donation_score'] = $this->calculateDonationScore($mergedData);
            }
        }
        return parent::update($id, $data);
    }
}