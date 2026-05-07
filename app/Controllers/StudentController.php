<?php

namespace App\Controllers;

use App\Models\StudentModel;

class StudentController extends BaseController
{
    public function index()
    {
        $model = new StudentModel();
        $keyword = $this->request->getGet('search');

        if (!empty($keyword)) {
            $model->groupStart()
                  ->like('name', $keyword)
                  ->orLike('email', $keyword)
                  ->orLike('course', $keyword)
                  ->groupEnd();
        }

        $students = $model->paginate(5, 'default');

        return view('students/index', [
            'students' => $students,
            'pager'    => $model->pager,
            'search'   => $keyword
        ]);
    }

    public function create()
    {
        return view('students/create', [
            'validation' => \Config\Services::validation()
        ]);
    }

    public function store()
    {
        $rules = [
            'name'   => 'required',
            'email'  => 'required|valid_email',
            'course' => 'required'
        ];

        if (!$this->validate($rules)) {
            return view('students/create', [
                'validation' => $this->validator
            ]);
        }

        $model = new StudentModel();

        $model->insert([
            'name'   => $this->request->getPost('name'),
            'email'  => $this->request->getPost('email'),
            'course' => $this->request->getPost('course'),
        ]);

        return redirect()->to(site_url('students'))
                         ->with('success', 'Student added successfully!');
    }

    public function edit(int $id)
    {
        $model = new StudentModel();

        $student = $model->find($id);

        if (!$student) {
            throw new \CodeIgniter\Exceptions\PageNotFoundException("Student with ID $id not found");
        }

        return view('students/edit', [
            'student' => $student,
            'validation' => \Config\Services::validation()
        ]);
    }

    public function update(int $id)
    {
        $rules = [
            'name'   => 'required',
            'email'  => 'required|valid_email',
            'course' => 'required'
        ];

        if (!$this->validate($rules)) {
            return view('students/edit', [
                'student' => [
                    'id'     => $id,
                    'name'   => $this->request->getPost('name'),
                    'email'  => $this->request->getPost('email'),
                    'course' => $this->request->getPost('course'),
                ],
                'validation' => $this->validator
            ]);
        }

        $model = new StudentModel();

        $model->update($id, [
            'name'   => $this->request->getPost('name'),
            'email'  => $this->request->getPost('email'),
            'course' => $this->request->getPost('course'),
        ]);

        return redirect()->to(site_url('students'))
                         ->with('success', 'Student updated successfully!');
    }

    public function delete(int $id)
    {
        $model = new StudentModel();
        $model->delete($id);

        return redirect()->to(site_url('students'))
                         ->with('success', 'Student deleted successfully!');
    }
}