<?php

session_start();
include "login.php";

if(!isset($_SESSION['kullanici_adi'])) {
  // session değişkeni mevcut, kullanıcı giriş yapmış
        header("location:index.php?error");
        die();
} /*else {
  // session değişkeni yok, kullanıcı giriş yapmamış
        }*/

?>


<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="style.css">
        <title>Home</title>
</head>
<body>

        <h1>Hos Geldiniz</h1>
</body>
</html>
