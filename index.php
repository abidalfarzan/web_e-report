<?php

session_start();

if(!isset($_SESSION['login'])) {
    header("Location: auth/login.php");
    exit;
}

require('connect.php');

$query = mysqli_query($conn, "SELECT * FROM pengaduan");

$i = 1;

?>

<!DOCTYPE html>

    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Daftar Pengaduan</title>
        <link href="assets/bootstrap.min.css" rel="stylesheet">
    </head>

    <header class="nav bg-primary d-flex flex-column justify-content-center align-items-center">
        <h2 class="text-center text-white p-3">E-REPORT</h2>

        <div class="d-flex justify-content-end align-items-center shadow-lg p-2 bg-white rounded mb-3">
            <a href="create.php" class="btn btn-primary me-3">Tambah Pengaduan</a>
            <a href="auth/logout.php" class="btn btn-danger">Logout</a>
        </div>
    </header>

    <body>

    <div class="container mt-5">
        <h1 class="text-center mb-5">Daftar Pengaduan</h1>

        <div class="d-flex justify-content-end align-items-center mb-3">
            <a href="create.php" class="btn btn-primary me-3">Tambah Pengaduan</a>
            <a href="auth/logout.php" class="btn btn-danger">Logout</a>
        </div>

        <table class="table table-bordered rounded-3">
            <thead class="bg-light text-black">
                <tr>
                    <th>No</th>
                    <th>Nama Pelapor</th>
                    <th>Email</th>
                    <th>Nomor Hp</th>
                    <th>Pengaduan</th>
                    <th>Tanggal</th>
                    <th>Aksi</th>
                </tr>
            </thead>
                
            <tbody>

                <?php while ($baris = mysqli_fetch_assoc($query)) { ?>
                <tr>
                    <td><?php echo $i; ?></td>
                    <td><?php echo $baris['nama']; ?></td>
                    <td><?php echo $baris['email']; ?></td>
                    <td><?php echo $baris['no_hp']; ?></td>
                    <td><?php echo $baris['isi_pengaduan']; ?></td>
                    <td><?php echo $baris['created']; ?></td>
                    <td>
                        <a href="edit.php?id=<?php echo $baris['id']; ?>" class="btn btn-warning">EDIT</a>
                        <form action="auth/delete-process.php" method="post">
                            <input readonly type="hidden" name="id" value="<?= $baris['id']?>">
                            <button class="btn btn-danger" 
                            type="submit" name="delete">DELETE</button>
                        </form>
                    </td>
                </tr>
                <?php $i++; } ?>

            </tbody>
        </table>
    </div>

    <script src="assets/bootstrap.min.js"></script>

    </body>

</html>