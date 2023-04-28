<?php session_start(); ?>
<?php

use LDAP\Result;

require_once("config.php");

//соединение с БД
$connect = new mysqli(HOST, USER, PASSWORD, DB);
if($connect->connect_error){
    exit("Ошибка подключения к БД: ".$connect->connect_error);
}
//установить кодировку
$connect->set_charset("utf8");

$login = $_POST['login'];
$password = $_POST['password'];

$sql = "SELECT * FROM `users` 
WHERE `login`=? AND `password`=md5(?)";

$result = $connect->prepare($sql);
$result->bind_param("ss", $login, $password);
$result->execute();
$result = $result->get_result();

if($row = $result->fetch_assoc()){
    $response = [
        "status" => true,
        "name" => $row["name"],
        "login" => $row["login"]
    ];
    $_SESSION["user-name"] = $row["name"];
}
else {
    $response = [
        "status" => false
    ];
}
echo json_encode($response);