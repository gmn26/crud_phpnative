<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Data Baru</title>
</head>
<body>
    <form action="prosesinput.php" method="POST" style="text-align: center;" enctype="multipart/form-data">
        <h2>Input Data Baru</h2>
        <label for="Nama Lengkap">
            Nama Lengkap
        </label>
        <br>
        <input type="text" name="nama_lengkap" required>
        <br>
        <br>
        <label for="Nama Panggilan">
            Nama Panggilan
        </label>
        <br>
        <input type="text" name="nama_panggilan" required>
        <br>
        <br>
        <label for="Tanggal Lahir">
            Tanggal Lahir
        </label>
        <br>
        <input type="date" name="tanggal_lahir" required>
        <br>
        <br>
        <label for="Alamat">
            Alamat
        </label>
        <br>
        <input type="text" name="alamat" required>
        <br>
        <br>
        <label for="Foto">
            Foto
        </label>
        <br>
        <input type="file" name="foto" required>
        <br>
        <br>
        <button name="submit">Input Data</button>
    </form>
    <a href="index.php" style="display: block; text-align: center">
        Lihat Data
    </a>
</body>
</html>