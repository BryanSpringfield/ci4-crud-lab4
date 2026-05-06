<?php

namespace App\Controllers;

use App\Models\StudentModel;
use CodeIgniter\RESTful\ResourceController;

class ApiController extends ResourceController
{
    public function index()
    {
        $model = new StudentModel();

        return $this->respond([
            'status' => 200,
            'data' => $model->findAll()
        ]);
    }
}