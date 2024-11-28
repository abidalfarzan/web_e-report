<?php

require('connect.php');

if(isset($_POST['submit'])) {
    $nama = $_POST['nama'];
    $email = $_POST['email'];
    $nomor = $_POST['nomor'];
    $pengaduan = $_POST['pengaduan'];
    $waktu = date('Y-m-d H:i:s');

    $result = mysqli_query($conn, "INSERT INTO pengaduan(id, nama, email, no_hp, isi_pengaduan, created)
    VALUES (id, '$nama', '$email', '$nomor', '$pengaduan', '$waktu')");
    mysqli_error($conn);

    if($result) {
        echo "<script>alert('Pengaduan berhasil dikirim!')</script>";
        header('Location: index.php');
    }
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PENGADUAN</title>
    <link href="assets/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5 mb-5">

    
<form style="background: white; border: 1px solid grey" class="p-3 rounded-3 shadow" action="" method="POST">
    
    <div class="d-flex justify-content-between align-items-center mb-2">
        <h2 class="text-primary text-center p-2 px-3 border border-primary rounded-5">Buat Pengaduan 📝</h2>
        <a href="index.php" class="btn btn-danger ms-3">Kembali</a>
    </div>
        
    <div class="mb-3">
        <label for="nama" class="form-label text-white bg-primary p-1 px-3 rounded-5">Nama Pelapor</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Silakan masukan Nama anda">
    </div>

    <div class="mb-3">
        <label for="email" class="form-label text-white bg-primary p-1 px-3 rounded-5">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Silakan masukan Email anda">
    </div>
    
    <div class="col-12 mb-3">
        <label for="email" class="form-label text-white bg-primary p-1 px-3 rounded-5">Nomor HP</label>
        <div class="input-group">
            <div class="input-group-text">+62</div>
            <input type="text" class="form-control" id="nomor" name="nomor" placeholder="Silakan masukan Nomor HP anda">
        </div>
    </div>  

    <div class="mb-3">
        <label for="pengaduan" class="form-label text-white bg-primary p-1 px-3 rounded-5">Pengaduan</label>
        <textarea type="text" class="form-control" id="pengaduan" name="pengaduan" rows="5" placeholder="Your Message" required></textarea>
    </div>

    <div class="d-grid mx-auto">
        <button type="submit" name="submit" class="btn btn-primary">Kirim</button>
    </div>

</form>
    
</body>
</html>