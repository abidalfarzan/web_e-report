<?php
require('connect.php');

// Cek apakah parameter id ada di URL
if (!isset($_GET['id'])) {
    echo "<script>
        alert('ID tidak ditemukan!');
        document.location.href='index.php';
    </script>";
    exit;
}

$id = $_GET['id'];

// Query untuk mendapatkan data berdasarkan ID
$queryData = "SELECT * FROM pengaduan WHERE id = $id";
$query = mysqli_query($conn, $queryData);

$data = mysqli_fetch_assoc($query); // Ambil data langsung

if (isset($_POST['ubah'])) {
    $nama = htmlspecialchars($_POST['nama']);
    $email = htmlspecialchars($_POST['email']);
    $nomor = htmlspecialchars($_POST['nomor']);
    $pengaduan = htmlspecialchars($_POST['pengaduan']);

    // Query untuk update data
    $result = mysqli_query(
        $conn,
        "UPDATE pengaduan SET
            nama='$nama', 
            email='$email', 
            no_hp='$nomor', 
            isi_pengaduan='$pengaduan'
        WHERE id=$id"
    );

    if ($result) {
        echo "<script>
            alert('Data Berhasil Di Update');
            document.location.href='index.php';
        </script>";
    } else {
        echo "<script>
            alert('Data Gagal Di Update');
        </script>";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Pengaduan</title>
    <link href="assets/bootstrap.min.css" rel="stylesheet">
</head>
<body class="container mt-5">

<form style="background: white; border: 1px solid grey" class="p-3 rounded-3 shadow" action="" method="POST">

    <div class="d-flex justify-content-between align-items-center mb-2">
        <h2 class="text-primary text-center p-2 px-3 border border-primary rounded-5">Edit Pengaduan 📝</h2>
        <a href="index.php" class="btn btn-danger ms-3">Kembali</a>
    </div>

    <div class="mb-3">
        <label for="nama" class="form-label text-white bg-primary p-1 px-3 rounded-5">Nama Pelapor</label>
        <input type="text" class="form-control" id="nama" name="nama" placeholder="Silakan masukan Nama anda" value="<?= $data['nama'] ?>" required>
    </div>

    <div class="mb-3">
        <label for="email" class="form-label text-white bg-primary p-1 px-3 rounded-5">Email</label>
        <input type="email" class="form-control" id="email" name="email" placeholder="Silakan masukan Email anda" value="<?= $data['email'] ?>" required>
    </div>
    
    <div class="col-12 mb-3">
        <label for="nomor" class="form-label text-white bg-primary p-1 px-3 rounded-5">Nomor HP</label>
        <div class="input-group">
            <div class="input-group-text">+62</div>
            <input type="text" class="form-control" id="nomor" name="nomor" placeholder="Silakan masukan Nomor HP anda" value="<?= $data['no_hp'] ?>" required>
        </div>
    </div>  

    <div class="mb-3">
        <label for="pengaduan" class="form-label text-white bg-primary p-1 px-3 rounded-5">Pengaduan</label>
        <textarea class="form-control" id="pengaduan" name="pengaduan" rows="5" placeholder="Your Message" required><?= $data['isi_pengaduan'] ?></textarea>
    </div>

    <div class="d-grid mx-auto">
        <button type="submit" name="ubah" class="btn btn-primary">Ubah</button>
    </div>
</form>
    
</body>
</html>
