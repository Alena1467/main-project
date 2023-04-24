<?php
header("Content-Type:text/html; charset=UTF-8;"); //используется для отправки необработанных HTTP-шапок

require_once("api/config.php"); // подключаем конфигурационной файл
require_once("api/core.php"); // подключаем класс ACore

if (isset($_GET['option'])){ //проверяем get параметр
    $class=trim(strip_tags($_GET['option'])); //очищаем его от HTML и PHP-теги и пробелы из начала и конца строки
    
} else {
    $class='main';
}
if (file_exists("api/".$class.".php")) { //проверяем существование файла
    include("api/".$class.".php"); //загружаем его
    if (class_exists($class)) { //проверяем существование класса
        $obj = new  $class; //создаем объект - экземпляр класса main
        $obj->get_body(); //вызываем функцию класса
    } else {
        exit("<p>Не верные данные для входа</p>"); //если класса не существует - то выходим
    }
} else {
    exit("<p>Не правильный адрес</p>"); //если файла не существует - то выходим
}
