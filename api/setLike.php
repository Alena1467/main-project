<?php
require_once("config.php");

//соединение с БД
$connect = new mysqli(HOST, USER, PASSWORD, DB);
if($connect->connect_error){
    exit("Ошибка подключения к БД: ".$connect->connect_error);
}
//установить кодировку
$connect->set_charset("utf8");


$id = $_GET['id'];
$sql = "UPDATE `students` SET `num_like`=`num_like` + 1 WHERE `student_id` = $id";

$result = $connect->query($sql);
if ($result) {
    echo "ok";
}
else {
    echo "error";
}
