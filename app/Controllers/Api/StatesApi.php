<?php
namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\StateModel;

class StatesApi extends ResourceController
{
    protected $modelName = StateModel::class;
    protected $format    = 'json';

    // ✅ Get all users
    public function index()
    {
        $data = $this->model
            ->join('countries', 'countries.id = states.country_id')
            ->select('states.id, states.name, states.country_id, countries.name as country_name')
            ->findAll();

        return $this->respond($data);
    }


    // ✅ Get single user
    public function show($id = null)
    {
        $data = $this->model->find($id);
        if(!$data){
            return $this->failNotFound("User not found");
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

    public function getStatesByCountry($country_id = null)
    {
        if (!$country_id) {
            return $this->fail('Country ID is required');
        }

        $data = $this->model
            ->where('country_id', $country_id)
            ->select('id, name, country_id')
            ->findAll();

        if (!$data || count($data) === 0) {
            return $this->failNotFound("No states found for this country");
        }

        return $this->respond($data);
    }


}