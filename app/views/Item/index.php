<!DOCTYPE html>
<html>

<head>
    <title>Items</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h2>Barang</h2>
        <a href="?action=add" class="btn btn-primary mb-2">Tambah Barang</a>
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Nama</th>
                    <th>Keterangan</th>
                    <th>Satuan</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($items as $item) : ?>
                    <tr>
                        <td><?php echo $item['NamaBarang']; ?></td>
                        <td><?php echo $item['Keterangan']; ?></td>
                        <td><?php echo $item['Satuan']; ?></td>
                        <td>
                            <a href="?action=edit&id=<?php echo $item['IdBarang']; ?>" class="btn btn-primary btn-sm">Edit</a>
                            <a href="?action=delete&id=<?php echo $item['IdBarang']; ?>" class="btn btn-danger btn-sm">Delete</a>
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
</body>

</html>