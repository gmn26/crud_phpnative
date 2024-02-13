<?php
    require 'connect.php';

    if(isset($_GET['orderby'])){
        $orderby = $_GET['orderby'];
        $direction = $_GET['direction'];
        $query = "SELECT * FROM profile ORDER BY $orderby $direction";
    }elseif(isset($_GET['cari'])){
        $where = $_GET['where'];
        $keyword = $_GET['keyword'];
        $query = "SELECT * FROM profile WHERE $where LIKE '%$keyword%'";
    }else{
        $query = "SELECT * FROM profile";
    }

    $result = mysqli_query($conn, $query);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>All Data</title>
</head>
<body>
    <div style="margin: auto; text-align:center; width: 80%">
        <form action="index.php">
            <h3 style="text-align: center;">Cari Data</h3>
            <select name="where">
                <option value="nama_lengkap">Nama Lengkap</option>
                <option value="nama_panggilan">Nama Panggilan</option>
                <!-- <option value="tanggal_lahir">Tanggal Lahir</option> -->
                <option value="alamat">Alamat</option>
            </select>
            <input type="text" name="keyword" required>
            <button name="cari">Cari Data</button>
            <a href="index.php">Reset</a>
        </form>
    </div>
    <h2 style="text-align:center;">
        Seluruh Data Profile
    </h2>
    <br>
    <div style="display: flex; justify-content: center;">
        <table border="1px">
            <thead>
                <td>Nomor</td>
                <td>Nama Lengkap|
                    <a href="index.php?orderby=nama_lengkap&direction=ASC">ASC</a>|
                    <a href="index.php?orderby=nama_lengkap&direction=DESC">DESC</a>
                </td>
                <td>Nama Panggilan|
                    <a href="index.php?orderby=nama_panggilan&direction=ASC">ASC</a>|
                    <a href="index.php?orderby=nama_panggilan&direction=DESC">DESC</a>
                </td>
                <td>Tanggal Lahir|
                    <a href="index.php?orderby=tanggal_lahir&direction=ASC">ASC</a>|
                    <a href="index.php?orderby=tanggal_lahir&direction=DESC">DESC</a>
                </td>
                <td>Alamat|
                    <a href="index.php?orderby=alamat&direction=ASC">ASC</a>|
                    <a href="index.php?orderby=alamat&direction=DESC">DESC</a>
                </td>
                <td>Foto</td>
                <td>Aksi</td>
            </thead>
            <tbody>
                <?php
                    if(mysqli_affected_rows($conn) == 0){
                        echo"
                            <tr>
                                <td colspan='7' style='text-align : center;'>Data Kosong</td>
                            </tr>
                            ";
                    }
                
                    $i = 1;
                    while($data = mysqli_fetch_row($result)){
                ?>
                <tr>
                    <td><?= $i; ?></td>
                    <td><?= $data[1]; ?></td>
                    <td><?= $data[2]; ?></td>
                    <td><?= $data[3]; ?></td>
                    <td><?= $data[4]; ?></td>
                    <td><img src="assets/img/<?= $data[5]; ?>" alt="<?= $data[5]; ?>" width="100px"></td>
                    <td>
                        <a href="edit.php?id=<?= $data[0]; ?>">
                            Ubah
                        </a>
                        |
                        <a href="delete.php?id=<?= $data[0]; ?>">
                            Hapus
                        </a>
                    </td>
                </tr>
                <?php
                        $i++;
                    }
                ?>
            </tbody>
        </table>
    </div>
    <br> <br>
    <a href="input.php" style="display:block; text-align: center;">
        Tambah Data
    </a>
</body>
</html>