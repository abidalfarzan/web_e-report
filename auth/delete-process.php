<?php
require('../connect.php');

if( isset($_POST['id']) && !empty($_POST['id']) ) {
    // Tangkap ID lalu taruh di wadah var bernama, $id
    $id = $_POST['id'];

    // Hapus Data berdasarkan 'ID'
    $result = mysqli_query($conn, "DELETE FROM pengaduan WHERE id = $id");

    if($result) {
        echo "<script>
        alert('Data berhasil di hapus!');
        window.location.replace('../index.php');
        </script>";
    } else {
        echo "<script>
        alert('Data gagal di hapus!');
        window.location.replace('../index.php');
        </script>";
    }
}

?>