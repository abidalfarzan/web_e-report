<?php

include('functions.php');

if(isset($_POST['register'])) {
    register($_POST);
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link href="../assets/bootstrap.min.css" rel="stylesheet">
    <style>
        li {
            list-style: none;
        }
    </style>
</head>
<body class="bg-light container mt-5">

    <h1 class="text-primary text-center mb-3">Register Admin</h1>

    <form style="background: lightblue;" class="p-3 rounded-3 shadow" action="" method="POST">

        <ul class="p-3">
            <li class="mb-3">
                <label for="email" class="form-label text-white bg-primary p-1 px-3 rounded-5">Email</label>
                <input type="email" class="form-control" id="email" name="email" placeholder="Silakan masukan Email anda">
            </li>
            <li class="mb-3">
                <label for="password" class="form-label text-white bg-primary p-1 px-3 rounded-5">Password</label>
                <input type="password" class="form-control" id="password" name="pw" placeholder="Silakan masukan Password anda">
            </li>
            <li class="mb-5">
                <label for="password" class="form-label text-white bg-primary p-1 px-3 rounded-5">Confirm Password</label>
                <input type="password" class="form-control" id="password2" name="pw2" placeholder="Silakan konfirmasi Password anda">
            </li>
            <li class="d-grid mx-auto">
                <button type="submit" name="register" class="btn btn-primary">Register</button>
            </li>
            <li class="mt-1 text-primary">
                <p>Already have an account? <a href="login.php" class="text-primary fw-bold">Login</a></p>
            </li>
        </ul>

    </form>
    
</body>
</html>