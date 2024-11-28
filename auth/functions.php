<?php
require('../connect.php');

function register($request) {
    global $conn;

    $email = $request['email'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo "<script>
            alert('Email Tidak Sesuai Format');
        </script>";
        return;
    }
    
    $resultCheckEmail = mysqli_query($conn, "SELECT email FROM users WHERE email = '$email'");
    if (mysqli_num_rows($resultCheckEmail) > 0) {
        echo "<script>
            alert('Email Sudah Terdaftar! Ganti Email yang lain!');
        </script>";
        return;
    }

    $pw = mysqli_real_escape_string($conn, $request['pw']);
    $pw2 = mysqli_real_escape_string($conn, $request['pw2']);

    if ($pw !== $pw2) {
        echo "<script>
            alert('Password Tidak Sama! Ganti Password yang lain!');
        </script>";
        return;
    }

    $pw = password_hash($pw, PASSWORD_DEFAULT);

    $result = mysqli_query($conn, "INSERT INTO users VALUES ('', '$email', '$pw')");
    if ($result) {
        echo "<script>
            alert('Berhasil! Silakan Login ulang');
            window.location.replace('login.php');
        </script>";
    } else {
        mysqli_error($conn);
    }
}

function login($request) {
    global $conn;

    $email = trim($request['email']);
    $pw = $request['pw'];

    $result = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email'");

    if (mysqli_num_rows($result) === 1) {
        $dataFetch = mysqli_fetch_assoc($result);

        if (password_verify($pw, $dataFetch['password'])) {
            $_SESSION['login'] = true;
            header("Location: ../index.php");
            echo "<script>
                alert('Selamat Datang!');
            </script>";
            exit;
        } else {
            echo "<script>
                alert('Password Salah!');
            </script>";
        }
    } else {
        echo "<script>
            alert('Email Tidak Terdaftar!');
        </script>";
    }
}
