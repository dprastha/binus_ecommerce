<!DOCTYPE html>
<html>

<head>
    <title>CRUD Example</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h2>Users</h2>
        <a href="add.php" class="btn btn-primary mb-2">Add User</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user) : ?>
                    <tr>
                        <td><?php echo $user['NamaDepan']; ?></td>
                        <td><?php echo $user['NamaBelakang']; ?></td>
                        <td>
                            <a href="edit.php?id=<?php echo $user['IdPengguna']; ?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="index.php?action=delete&id=<?php echo $user['IdPengguna']; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>