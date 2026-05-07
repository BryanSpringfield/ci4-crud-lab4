<?php

namespace App\Controllers;

use App\Models\StudentModel;
use CodeIgniter\RESTful\ResourceController;

class ApiController extends ResourceController
{
    public function index()
    {
        $studentModel = new StudentModel();

        $students = $studentModel->findAll();

        return $this->respond(
            [
                'status' => 200,
                'data'   => $students,
            ]
        );
    }
}