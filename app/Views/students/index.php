<!DOCTYPE html>
<html>
<head>
    <title>Students</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-4">

<h2 class="mb-3">Student List</h2>

<?php $success = session()->getFlashdata('success'); ?>
<?php if (!empty($success) && is_string($success)): ?>
    <p style="color: green; font-weight: 500;">
        <?= esc($success) ?>
    </p>
<?php endif; ?>

<!-- SEARCH -->
<form method="get" action="/students" class="mb-3">
    <input type="text"
           name="search"
           class="form-control w-25 d-inline"
           value="<?= esc((string) ($search ?? '')) ?>">
    <button class="btn btn-primary btn-sm">Search</button>
</form>

<!-- ADD BUTTON -->
<a href="/students/create" class="btn btn-success mb-3">Add Student</a>

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
            <a href="/students/edit/<?= esc((string)$s['id']) ?>" class="btn btn-warning btn-sm">Edit</a>
            <a href="/students/delete/<?= esc((string)$s['id']) ?>"
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

<!-- ✅ PAGINATION (SAFE, NO ERROR) -->
<div class="d-flex justify-content-center mt-4">
    <?php if (isset($pager) && $pager !== null): ?>
        <?= $pager->links('default', 'bootstrap_full') ?>
    <?php endif; ?>
</div>

</body>
</html>