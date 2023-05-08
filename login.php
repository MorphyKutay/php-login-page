<?php

session_start();
$_SESSION['id'] = $id;
include "baglan.php";

// Formdan kullanıcı adı ve şifreyi al
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kullanici_adi = mysqli_real_escape_string($conn, $_POST['uname']);
    $sifre = mysqli_real_escape_string($conn, $_POST['password']);

    // Veritabanından kullanıcıyı sorgula
    $sql = "SELECT * FROM veri WHERE username = '$kullanici_adi' AND password = '$sifre'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        // Oturumu başlat ve kullanıcı bilgilerini sakla
        $_SESSION["kullanici_adi"] = $kullanici_adi;
        $_SESSION["giris_zamani"] = time(); // Unix zaman damgası
        $_SESSION['adminlogin'] = true;

        // Ana sayfaya yönlendir
        header("Location: home.php");
        exit();
    } else {
            header("Location: index.php?error");
            exit();
    }
}
