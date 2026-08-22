<?php
namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\DonorModel;

class DonorApi extends ResourceController
{
    protected $modelName = DonorModel::class;
    protected $format    = 'json';

    // ✅ Get all users
    public function index()
    {
        $data = $this->model
            ->select('blood_donors.*, 
                      countries.name as country_name, 
                      states.name as state_name, 
                      cities.name as city_name')
            ->join('countries','countries.id = blood_donors.country_id','left')
            ->join('states','states.id = blood_donors.state_id','left')
            ->join('cities','cities.id = blood_donors.city_id','left')
            ->orderBy('blood_donors.id','DESC')
            ->findAll();

        return $this->respond($data);
    }

    // ✅ Get single user
//    public function show($id = null)
//    {
//        $data = $this->model->find($id);
//        if(!$data){
//            return $this->failNotFound("User not found");
//        }
//        return $this->respond($data);
//    }

    public function show($id = null)
    {
        $data = $this->model
            ->select('blood_donors.*, 
                  countries.name as country_name, 
                  states.name as state_name, 
                  cities.name as city_name')
            ->join('countries', 'countries.id = blood_donors.country_id', 'left')
            ->join('states', 'states.id = blood_donors.state_id', 'left')
            ->join('cities', 'cities.id = blood_donors.city_id', 'left')
            ->where('blood_donors.id', $id)
            ->first();

        if (!$data) {
            return $this->failNotFound("Donor not found");
        }

        return $this->respond($data);
    }


    // ✅ Create new user
    public function create()
    {
        $input = $this->request->getJSON(true); // true = array

        if(!$this->model->insert($input)){
            return $this->fail($this->model->errors());
        }
        return $this->respondCreated([
            'status' => 'success',
            'message' => 'User created successfully'
        ]);
    }

    // ✅ Update user
    public function update($id = null)
    {
        $input = $this->request->getJSON(true);

        if(!$this->model->update($id, $input)){
            return $this->fail($this->model->errors());
        }
        return $this->respond([
            'status' => 'success',
            'message' => 'User updated successfully'
        ]);
    }

    // ✅ Delete user
    public function delete($id = null)
    {
        if(!$this->model->delete($id)){
            return $this->fail("User not deleted or not found");
        }
        return $this->respondDeleted([
            'status' => 'success',
            'message' => 'User deleted successfully'
        ]);
    }

    // ✅ Filter donors by blood group, country, state, city (only active)
    public function filter()
    {
        $bloodGroup = $this->request->getGet('blood_group');
        $countryId  = $this->request->getGet('country_id');
        $stateId    = $this->request->getGet('state_id');
        $cityId     = $this->request->getGet('city_id');

        $builder = $this->model
            ->select('blood_donors.*, 
                  countries.name as country_name, 
                  states.name as state_name, 
                  cities.name as city_name')
            ->join('countries', 'countries.id = blood_donors.country_id', 'left')
            ->join('states', 'states.id = blood_donors.state_id', 'left')
            ->join('cities', 'cities.id = blood_donors.city_id', 'left')
            ->where('blood_donors.status', 'active'); // Only active donors

        if ($bloodGroup) {
            $builder->where('blood_donors.blood_group', $bloodGroup);
        }
        if ($countryId) {
            $builder->where('blood_donors.country_id', $countryId);
        }
        if ($stateId) {
            $builder->where('blood_donors.state_id', $stateId);
        }
        if ($cityId) {
            $builder->where('blood_donors.city_id', $cityId);
        }

        $data = $builder->orderBy('blood_donors.id', 'DESC')->findAll();

        return $this->respond($data);
    }


    // ✅ Increment donor views
    public function incrementViews($id = null)
    {
        if (!$id) {
            return $this->fail("Missing donor ID");
        }

        $donor = $this->model->find($id);

        if (!$donor) {
            return $this->failNotFound("Donor not found");
        }

        // Increment the 'views' count safely
        $newViews = (int)$donor['views'] + 1;

        $this->model->update($id, ['views' => $newViews]);

        return $this->respond([
            'status' => 'success',
            'views' => $newViews,
            'message' => 'Views count updated'
        ]);
    }


    // ✅ Fetch top 4 donors based on donation_score
    public function topDonors()
    {
        $data = $this->model
            ->select('blood_donors.*, 
                  countries.name as country_name, 
                  states.name as state_name, 
                  cities.name as city_name')
            ->join('countries', 'countries.id = blood_donors.country_id', 'left')
            ->join('states', 'states.id = blood_donors.state_id', 'left')
            ->join('cities', 'cities.id = blood_donors.city_id', 'left')
            ->where('blood_donors.status', 'active')
            ->orderBy('blood_donors.donation_score', 'DESC')
            ->limit(4)
            ->findAll();

        return $this->respond($data);
    }

    public function fetch_latest()
    {
        $donorModel = new \App\Models\DonorModel();

        $latestDonors = $donorModel
            ->orderBy('created_at', 'DESC')
            ->limit(4)
            ->findAll();

        return $this->response->setJSON($latestDonors);
    }


    // Add this method to your DonorApi controller
    // ✅ Send contact message to donor with SMS notification
    public function sendContactMessage()
    {
        // Get JSON data from request
        $input = $this->request->getJSON(true);

        // Validate required fields
        if (empty($input['donor_id']) || empty($input['sender_name']) ||
            empty($input['sender_phone']) || empty($input['message'])) {
            return $this->fail("All fields are required", 400);
        }

        $donorId = $input['donor_id'];
        $donorPhone = $input['donor_phone'] ?? '';
        $donorName = $input['donor_name'] ?? 'Donor';
        $senderName = $input['sender_name'];
        $senderPhone = $input['sender_phone'];
        $message = $input['message'];

        try {
            // 1. Save message to database (optional - create contact_messages table)
            // $this->saveContactMessage($input);

            // 2. Send SMS to donor
            $smsSent = $this->sendSMSNotification($donorPhone, $donorName, $senderName, $senderPhone, $message);

            // 3. Send SMS to sender (optional - confirmation)
            $this->sendConfirmationSMS($senderPhone, $senderName);

            // Log the contact request
            log_message('info', "Contact request: Donor ID {$donorId}, Sender: {$senderName} ({$senderPhone})");

            return $this->respond([
                'status' => 'success',
                'message' => 'Message sent successfully! The donor has been notified via SMS.',
                'data' => [
                    'donor_id' => $donorId,
                    'sms_sent' => $smsSent,
                    'timestamp' => date('Y-m-d H:i:s')
                ]
            ]);

        } catch (\Exception $e) {
            log_message('error', 'Contact message error: ' . $e->getMessage());
            return $this->fail("Error sending message: " . $e->getMessage(), 500);
        }
    }

// ✅ Send SMS to donor
    private function sendSMSNotification($donorPhone, $donorName, $senderName, $senderPhone, $message)
    {
        // Remove any non-numeric characters from phone number
        $cleanPhone = preg_replace('/[^0-9]/', '', $donorPhone);

        if (empty($cleanPhone) || strlen($cleanPhone) < 10) {
            log_message('warning', "Invalid donor phone number: {$donorPhone}");
            return false;
        }

        // Truncate message if too long
        $truncatedMessage = strlen($message) > 100 ? substr($message, 0, 97) . '...' : $message;

        // Create SMS content
        $smsContent = "URGENT: Blood Donation Request\n\n";
        $smsContent .= "Hello {$donorName},\n";
        $smsContent .= "{$senderName} ({$senderPhone}) wants to contact you for blood donation.\n";
        $smsContent .= "Message: {$truncatedMessage}\n\n";
        $smsContent .= "Please respond ASAP.\n";
        $smsContent .= "From: Blood Donation Portal";

        // Choose your SMS gateway method:

        // Method 1: Using Twilio (Recommended)
        // return $this->sendViaTwilio($cleanPhone, $smsContent);

        // Method 2: Using TextLocal (Popular in India/Pakistan)
        // return $this->sendViaTextLocal($cleanPhone, $smsContent);

        // Method 3: Using SMS Gateway API
        // return $this->sendViaGatewayAPI($cleanPhone, $smsContent);

        // Method 4: For testing - Log SMS instead of sending
        log_message('info', "SMS to donor {$cleanPhone}: " . $smsContent);

        // For now, return true to simulate success
        // In production, uncomment one of the methods above
        return true;
    }

// ✅ Send confirmation SMS to sender
    private function sendConfirmationSMS($senderPhone, $senderName)
    {
        $cleanPhone = preg_replace('/[^0-9]/', '', $senderPhone);

        if (empty($cleanPhone) || strlen($cleanPhone) < 10) {
            return false;
        }

        $smsContent = "Thank you {$senderName}! Your blood donation request has been sent to the donor. They will contact you soon.\n\n";
        $smsContent .= "Blood Donation Portal";

        log_message('info', "Confirmation SMS to sender {$cleanPhone}: " . $smsContent);

        // Uncomment to actually send
        // return $this->sendViaTwilio($cleanPhone, $smsContent);
        return true;
    }

// ✅ Save contact message to database (optional)
    private function saveContactMessage($data)
    {
        // Create this table first in your database:
        /*
        CREATE TABLE contact_messages (
            id INT AUTO_INCREMENT PRIMARY KEY,
            donor_id INT NOT NULL,
            sender_name VARCHAR(100) NOT NULL,
            sender_phone VARCHAR(20) NOT NULL,
            message TEXT NOT NULL,
            sms_sent BOOLEAN DEFAULT false,
            created_at TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
            FOREIGN KEY (donor_id) REFERENCES blood_donors(id)
        );
        */

        $db = \Config\Database::connect();

        $builder = $db->table('contact_messages');
        $messageData = [
            'donor_id' => $data['donor_id'],
            'sender_name' => $data['sender_name'],
            'sender_phone' => $data['sender_phone'],
            'message' => $data['message'],
            'sms_sent' => 1,
            'created_at' => date('Y-m-d H:i:s')
        ];

        return $builder->insert($messageData);
    }

// ✅ Example: Send SMS via Twilio
    private function sendViaTwilio($phoneNumber, $message)
    {
        // Install Twilio SDK: composer require twilio/sdk
        /*
        $account_sid = getenv('TWILIO_ACCOUNT_SID');
        $auth_token = getenv('TWILIO_AUTH_TOKEN');
        $twilio_number = getenv('TWILIO_PHONE_NUMBER');

        $client = new \Twilio\Rest\Client($account_sid, $auth_token);

        try {
            $client->messages->create(
                '+92' . $phoneNumber, // Format for Pakistan
                [
                    'from' => $twilio_number,
                    'body' => $message
                ]
            );
            return true;
        } catch (\Exception $e) {
            log_message('error', 'Twilio error: ' . $e->getMessage());
            return false;
        }
        */

        return true; // For testing
    }

// ✅ Example: Send SMS via TextLocal
    private function sendViaTextLocal($phoneNumber, $message)
    {
        /*
        $apiKey = getenv('TEXTLOCAL_API_KEY');
        $sender = getenv('TEXTLOCAL_SENDER');

        $data = [
            'apikey' => $apiKey,
            'numbers' => '92' . $phoneNumber, // Pakistan format
            'sender' => $sender,
            'message' => $message
        ];

        $ch = curl_init('https://api.textlocal.in/send/');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        $response = curl_exec($ch);
        curl_close($ch);

        $result = json_decode($response, true);

        if ($result['status'] == 'success') {
            return true;
        } else {
            log_message('error', 'TextLocal error: ' . print_r($result, true));
            return false;
        }
        */

        return true; // For testing
    }

}


