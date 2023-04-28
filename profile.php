<?php session_start(); ?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Клиент-серверное приложение</title>
</head>
<body>
    <h1>Профиль пользователя</h1>
    <?php
        if(isset($_GET["exit"])){
            unset($_SESSION["user-name"]);
            header("Location:./");
        }
        if(isset($_SESSION["user-name"])){
            echo $_SESSION["user-name"];
            echo "<a href='profile.php'>перейти в профиль</a>";
        }
    ?>

    <a href="?exit=true">Выйти</a>
</body>
</html>