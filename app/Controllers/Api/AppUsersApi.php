<?php
namespace App\Controllers\Api;

use CodeIgniter\RESTful\ResourceController;
use App\Models\AppUserModel;

class AppUsersApi extends ResourceController
{
    protected $modelName = AppUserModel::class;
    protected $format    = 'json';

    // ✅ Get all users
    public function index()
    {
        $data = $this->model
            ->select('app_users.id, full_name, mobile, blood_group, status, 
                      countries.name as country_name, states.name as state_name, cities.name as city_name')
            ->join('countries','countries.id=app_users.country_id','left')
            ->join('states','states.id=app_users.state_id','left')
            ->join('cities','cities.id=app_users.city_id','left')
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



}