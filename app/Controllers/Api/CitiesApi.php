<?php
namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\CityModel;

class CitiesApi extends ResourceController
{
    protected $modelName = CityModel::class;
    protected $format    = 'json';

    // ✅ Get all users
    public function index()
    {
        $data = $this->model
            ->join('states','states.id=cities.state_id')
            ->join('countries','countries.id=states.country_id')
            ->select('cities.id,cities.name,cities.state_id,states.name as state_name,countries.name as country_name,countries.id as country_id')
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
    public function getCitiesByState($state_id = null)
    {
        if (!$state_id) {
            return $this->fail('State ID is required');
        }

        $data = $this->model
            ->where('state_id', $state_id)
            ->select('id, name, state_id')
            ->findAll();

        if (!$data || count($data) === 0) {
            return $this->failNotFound("No cities found for this state");
        }

        return $this->respond($data);
    }


}