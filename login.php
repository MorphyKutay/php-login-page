<?php

session_start();
$_SESSION['id'] = $id;
include "baglan.php";

// Formdan kullanıcı adı ve şifreyi al
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $kullanici_adi = $_POST['uname'];
    $sifre = $_POST['password'];

    // Veritabanından kullanıcıyı sorgula
    $sql = "SELECT * FROM veri WHERE uname = '$kullanici_adi' AND pass = '$sifre'";
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
        echo "hata";
    }
}
?>
