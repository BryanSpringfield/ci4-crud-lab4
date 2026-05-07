<?php

$validation = $validation ?? \Config\Services::validation();

$student = $student ?? [
    'id' => '',
    'name' => '',
    'email' => '',
    'course' => ''
];

?>

<!DOCTYPE html>
<html>
<head>
    <title>Edit Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2 class="mb-3">Edit Student</h2>

<form method="post" action="/students/update/<?= esc($student['id']) ?>">

    <!-- NAME -->
    <input
        type="text"
        name="name"
        value="<?= esc(old('name') ?? $student['name']) ?>"
        class="form-control mb-2 <?= ($validation->hasError('name')) ? 'is-invalid' : '' ?>"
        placeholder="Enter Name">

    <div class="text-danger mb-2">
        <?= esc($validation->getError('name') ?? '') ?>
    </div>

    <!-- EMAIL -->
    <input
        type="email"
        name="email"
        value="<?= esc(old('email') ?? $student['email']) ?>"
        class="form-control mb-2 <?= ($validation->hasError('email')) ? 'is-invalid' : '' ?>"
        placeholder="Enter Email">

    <div class="text-danger mb-2">
        <?= esc($validation->getError('email') ?? '') ?>
    </div>

    <!-- COURSE -->
    <input
        type="text"
        name="course"
        value="<?= esc(old('course') ?? $student['course']) ?>"
        class="form-control mb-3 <?= ($validation->hasError('course')) ? 'is-invalid' : '' ?>"
        placeholder="Enter Course">

    <div class="text-danger mb-3">
        <?= esc($validation->getError('course') ?? '') ?>
    </div>

    <!-- BUTTONS -->
    <button class="btn btn-primary">Update</button>
    <a href="/students" class="btn btn-secondary">Cancel</a>

</form>

</body>
</html>