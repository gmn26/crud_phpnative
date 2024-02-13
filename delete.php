<?php
    require 'connect.php';

    $id = $_GET['id'];

    $query = "DELETE FROM profile WHERE id = $id";

    $result = mysqli_query($conn, $query);

    if(mysqli_affected_rows($conn) > 0){
        echo "<script>
                alert('Data Berhasil Dihapus')
                document.location.href = 'index.php'
            </script>";
    }else{
        echo "<script>
                alert('Data Gagal Dihapus')
                document.location.href = 'index.php'
            </script>";    
    }
?>