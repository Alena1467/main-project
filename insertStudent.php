<?php
$fname = $_POST['fname'];
$lname = $_POST['lname'];
$age = $_POST['age'];
$gender = $_POST['gender'];

require_once("config.php");

//соединение с БД
$connect = new mysqli(HOST, USER, PASSWORD, DB);
if($connect->connect_error){
    exit("Ошибка подключения к БД: ".$connect->connect_error);
}
//установить кодировку
$connect->set_charset("utf8");

//код запроса
$sql = "INSERT INTO `students`(`fname`, `lname`, `gender`, `age`) VALUES ('$fname', '$lname', '$gender', $age)";

//выполнение запроса
$result = $connect->query($sql);
    if ($result) {
        echo "ok";
    }
    else {
        echo "error";
    }

