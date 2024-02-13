<?php
    require 'connect.php';

    $id = $_POST['id'];
    $nama_lengkap = $_POST['nama_lengkap'];
    $nama_panggilan = $_POST['nama_panggilan'];
    $tanggal_lahir = $_POST['tanggal_lahir'];
    $alamat = $_POST['alamat'];
    $accepted_extension = ['jpg', 'jpeg', 'png'];
    $filename = $_FILES['foto']['name'];
    // $filesize = $_FILES['foto']['size'];
    $fileext = pathinfo($filename, PATHINFO_EXTENSION);
    if(!in_array($fileext, $accepted_extension)){
        echo "<script>
                    alert('Extensi foto yang diterima hanyalah .jpg, .jpeg, dan .png')
                    document.location.href = 'input.php';
                </script>";
    }else{
        move_uploaded_file($_FILES['foto']['tmp_name'], 'assets/img/' . $filename);
    
        $query = "UPDATE profile SET nama_lengkap = '$nama_lengkap', nama_panggilan = '$nama_panggilan', tanggal_lahir = '$tanggal_lahir', alamat = '$alamat', foto = '$filename' WHERE id = $id";
        $result = mysqli_query($conn, $query);
    
        if(mysqli_affected_rows($conn) > 0){
            echo"<script>
                    alert('Data Berhasil diubah')
                    document.location.href = 'index.php'
                </script>";
            // header('location: index.php');
        }else{
            echo"<script>
                    alert('Data gagal diubah')
                    document.location.href = 'edit.php?id=$id'
                </script>";
            // header('location: input.php');
        }
    }

?>