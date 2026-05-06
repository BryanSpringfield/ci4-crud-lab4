<?php $validation = $validation ?? \Config\Services::validation(); ?>

<!DOCTYPE html>
<html>
<head>
    <title>Add Student</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2>Add Student</h2>

<form method="post" action="/students/store">

    <input type="text" name="name"
        placeholder="Name"
        value="<?= esc(old('name') ?? '') ?>"
        class="form-control mb-2 <?= ($validation->hasError('name')) ? 'is-invalid' : '' ?>">

    <div class="text-danger mb-2">
        <?= esc($validation->getError('name') ?? '') ?>
    </div>

    <input type="email" name="email"
        placeholder="Email"
        value="<?= esc(old('email') ?? '') ?>"
        class="form-control mb-2 <?= ($validation->hasError('email')) ? 'is-invalid' : '' ?>">

    <div class="text-danger mb-2">
        <?= esc($validation->getError('email') ?? '') ?>
    </div>

    <input type="text" name="course"
        placeholder="Course"
        value="<?= esc(old('course') ?? '') ?>"
        class="form-control mb-2 <?= ($validation->hasError('course')) ? 'is-invalid' : '' ?>">

    <div class="text-danger mb-2">
        <?= esc($validation->getError('course') ?? '') ?>
    </div>

    <button class="btn btn-success">Save</button>
    <a href="/students" class="btn btn-secondary">Cancel</a>

</form>

</body>
</html>