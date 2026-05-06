<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Students</title>

    <link
        href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css"
        rel="stylesheet">
</head>

<body>

<div class="container mt-4">

    <h2 class="mb-3">Student List</h2>

    <?php if ($message = session()->getFlashdata('success')) : ?>
        <div class="text-success fw-medium mb-3">
            <?= esc($message) ?>
        </div>
    <?php endif; ?>

    <form action="/students" method="GET" class="mb-3">

        <input
            type="text"
            name="search"
            class="form-control d-inline w-25"
            value="<?= esc($search ?? '') ?>">

        <button type="submit" class="btn btn-primary btn-sm">
            Search
        </button>

    </form>

    <a href="/students/create" class="btn btn-success mb-3">
        Add Student
    </a>

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

        <?php if (!empty($students)) : ?>

            <?php foreach ($students as $student) : ?>

                <tr>
                    <td><?= esc($student['id']) ?></td>
                    <td><?= esc($student['name']) ?></td>
                    <td><?= esc($student['email']) ?></td>
                    <td><?= esc($student['course']) ?></td>

                    <td class="text-center">

                        <a
                            href="/students/edit/<?= esc($student['id']) ?>"
                            class="btn btn-warning btn-sm">
                            Edit
                        </a>

                        <a
                            href="/students/delete/<?= esc($student['id']) ?>"
                            class="btn btn-danger btn-sm"
                            onclick="return confirm('Are you sure?')">
                            Delete
                        </a>

                    </td>
                </tr>

            <?php endforeach; ?>

        <?php else : ?>

            <tr>
                <td colspan="5" class="text-center">
                    No data
                </td>
            </tr>

        <?php endif; ?>

        </tbody>

    </table>

    <?php if (!empty($pager)) : ?>
        <div class="d-flex justify-content-center mt-4">
            <?= $pager->links('default', 'bootstrap_full') ?>
        </div>
    <?php endif; ?>

</div>

</body>
</html>