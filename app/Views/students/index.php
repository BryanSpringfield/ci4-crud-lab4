<!DOCTYPE html>
<html>
<head>
    <title>Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2 class="mb-3">Student List</h2>

<<<<<<< HEAD
<!-- SUCCESS MESSAGE -->
=======
<h5 class="text-success">Bootstrap UI Applied</h5>

>>>>>>> daa953f87b1adf1e89eaef397cdcc85723cdd69a
<?php $success = session()->getFlashdata('success'); ?>
<?php if (!empty($success) && is_string($success)): ?>
    <div class="alert alert-success">
        <?= esc($success) ?>
    </div>
<?php endif; ?>

<!-- SEARCH -->
<<<<<<< HEAD
<form method="get" action="<?= base_url('students') ?>" class="mb-3">
=======
<form method="get" action="/students" class="mb-3">
    <p class="text-info">Search feature active</p>
>>>>>>> daa953f87b1adf1e89eaef397cdcc85723cdd69a
    <input type="text"
           name="search"
           class="form-control w-25 d-inline"
           value="<?= esc((string) ($search ?? '')) ?>">
    <button class="btn btn-primary btn-sm">Search</button>
</form>

<!-- ADD BUTTON -->
<a href="<?= base_url('students/create') ?>" class="btn btn-success mb-3">Add Student</a>

<!-- TABLE -->
<table class="table table-bordered table-striped">
<thead class="table-dark">
<tr>
    <th>ID</th>
    <th>Name</th>
    <th>Email</th>
    <th>Course</th>
    <th class="text-center">Action</th>
</tr>
</thead>
<tbody>

<?php if (!empty($students) && is_array($students)): ?>
    <?php foreach ($students as $s): ?>
    <tr>
        <td><?= esc((string)$s['id']) ?></td>
        <td><?= esc((string)$s['name']) ?></td>
        <td><?= esc((string)$s['email']) ?></td>
        <td><?= esc((string)$s['course']) ?></td>
        <td class="text-center">
            <a href="<?= base_url('students/edit/' . $s['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="<?= base_url('students/delete/' . $s['id']) ?>"
               class="btn btn-danger btn-sm"
               onclick="return confirm('Are you sure?')">Delete</a>
        </td>
    </tr>
    <?php endforeach; ?>
<?php else: ?>
<tr>
    <td colspan="5" class="text-center">No data</td>
</tr>
<?php endif; ?>

</tbody>
</table>

<!-- PAGINATION -->
<div class="d-flex justify-content-center mt-4">
    <?php if (isset($pager) && $pager !== null): ?>
        <?= $pager->links('default', 'bootstrap_full') ?>
    <?php endif; ?>
</div>

</body>
</html>