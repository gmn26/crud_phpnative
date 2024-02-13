<?php
    require 'connect.php';

    $id = $_GET['id'];

    $query = "SELECT * FROM profile WHERE id=$id";

    $result = mysqli_query($conn, $query);

    $data = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Data</title>
</head>
<body>
    <form action="prosesedit.php" method="POST" style="text-align: center;" enctype="multipart/form-data">
        <h2>Input Data Baru</h2>
        <input type="hidden" name="id" value="<?= $data['id']; ?>">
        <label for="Nama Lengkap">
            Nama Lengkap
        </label>
        <br>
        <input type="text" name="nama_lengkap" value="<?= $data['nama_lengkap']; ?>" required>
        <br>
        <br>
        <label for="Nama Panggilan">
            Nama Panggilan
        </label>
        <br>
        <input type="text" name="nama_panggilan" value="<?= $data['nama_panggilan']; ?>" required>
        <br>
        <br>
        <label for="Tanggal Lahir">
            Tanggal Lahir
        </label>
        <br>
        <input type="date" name="tanggal_lahir" value="<?= $data['tanggal_lahir']; ?>" required>
        <br>
        <br>
        <label for="Alamat">
            Alamat
        </label>
        <br>
        <input type="text" name="alamat" value="<?= $data['alamat']; ?>" required>
        <br>
        <br>
        <label for="Foto">
            Foto
        </label>
        <br>
        <img src="assets/img/<?= $data['foto']; ?>" alt="<?= $data['foto']; ?>" width="300px">
        <br>
        <input type="file" name="foto" value="<?= $data['foto']; ?>" required>
        <br>
        <br>
        <button name="submit">Edit Data</button>
    </form>
    <a href="index.php" style="display: block; text-align: center">
        Lihat Data
    </a>
</body>
</html>