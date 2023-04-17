<?php
header("Content-Type:text/html; charset=UTF-8");

require_once("api/config.php");
require_once("api/core.php");

if(file_exists("api/main.php")){//проверяем существование файла
    include("api/main.php");// то подключаем
    if (class_exists("Main")){//если сущ класс
        $obj = new Main;// создаем объект от класса Main
        $obj->get_body();
    } else {
        exit("<p>неверный класс</p>");
    }
    
}

else {
    exit("<p>неверный путь</p>");
}
