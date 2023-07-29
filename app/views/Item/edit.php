<!DOCTYPE html>
<html>

<head>
    <title>Edit Barang</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>

<body>
    <div class="container mt-4">
        <h2>Edit Barang</h2>
        <form method="post">
            <div class="form-group">
                <label>Nama Barang</label>
                <input type="text" name="nama" class="form-control" value="<?php echo $item['NamaBarang']; ?>" required>
            </div>
            <div class="form-group">
                <label>Keterangan</label>
                <input type="text" name="keterangan" class="form-control" value="<?php echo $item['Keterangan']; ?>" required>
            </div>
            <div class="form-group">
                <label>Satuan</label>
                <input type="text" name="satuan" class="form-control" value="<?php echo $item['Satuan']; ?>" required>
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
            <a href="index.php" class="btn btn-secondary">Cancel</a>
        </form>
    </div>
</body>

</html>