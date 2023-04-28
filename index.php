<?php session_start(); ?>
<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Клиент-серверное приложение</title>
    <link rel="stylesheet" href="style.css">
    <script defer src="script.js"></script>
    <script defer src="fetch.js"></script>
</head>
<body>
    <header>
        <p class="profile">
            <a href="#form-auth">Авторизоваться</a>
        </p>
        <?php
            if(isset($_SESSION["user-name"])){
                echo $_SESSION["user-name"];
            }
        ?>
    </header>
    <form id="form-insert-student">
        <input type="text" name="fname" id="fname" placeholder="введите имя" required><br>
        <input type="text" name="lname" id="lname" placeholder="введите фамилию" required><br>
        <input type="number" name="age" id="age" placeholder="введите возраст" required><br>
        <input type="radio" name="gender" id="m" value="m" checked>
        <label for="m">мужской</label>
        <input type="radio" name="gender" id="f" value="f">
        <label for="f">женский</label><br>
        <input type="submit" value="добавить">
    </form>

<div class="content">    
<?php

require_once("api/config.php");

//соединение с БД
$connect = new mysqli(HOST, USER, PASSWORD, DB);
if($connect->connect_error){
    exit("Ошибка подключения к БД: ".$connect->connect_error);
}
//установить кодировку
$connect->set_charset("utf8");

//код запроса
$sql = "SELECT * FROM `students`";
$sqlg = "SELECT * FROM `groups`";
//выполнить запрос
$result = $connect->query($sql);
$resultg = $connect->query($sqlg); 

//вести результаты запроса на страницу
while ($row = $result->fetch_assoc()){
    echo "<div class='student' data-id='$row[student_id]'>
            $row[lname], $row[fname], $row[gender], $row[age]
            <svg xmlns='http://www.w3.org/2000/svg' width='16' height='16' fill='currentColor' class='bi bi-apple like' viewBox='0 0 16 16'>
  <path d='M11.182.008C11.148-.03 9.923.023 8.857 1.18c-1.066 1.156-.902 2.482-.878 2.516.024.034 1.52.087 2.475-1.258.955-1.345.762-2.391.728-2.43Zm3.314 11.733c-.048-.096-2.325-1.234-2.113-3.422.212-2.189 1.675-2.789 1.698-2.854.023-.065-.597-.79-1.254-1.157a3.692 3.692 0 0 0-1.563-.434c-.108-.003-.483-.095-1.254.116-.508.139-1.653.589-1.968.607-.316.018-1.256-.522-2.267-.665-.647-.125-1.333.131-1.824.328-.49.196-1.422.754-2.074 2.237-.652 1.482-.311 3.83-.067 4.56.244.729.625 1.924 1.273 2.796.576.984 1.34 1.667 1.659 1.899.319.232 1.219.386 1.843.067.502-.308 1.408-.485 1.766-.472.357.013 1.061.154 1.782.539.571.197 1.111.115 1.652-.105.541-.221 1.324-1.059 2.238-2.758.347-.79.505-1.217.473-1.282Z'/>
  <path d='M11.182.008C11.148-.03 9.923.023 8.857 1.18c-1.066 1.156-.902 2.482-.878 2.516.024.034 1.52.087 2.475-1.258.955-1.345.762-2.391.728-2.43Zm3.314 11.733c-.048-.096-2.325-1.234-2.113-3.422.212-2.189 1.675-2.789 1.698-2.854.023-.065-.597-.79-1.254-1.157a3.692 3.692 0 0 0-1.563-.434c-.108-.003-.483-.095-1.254.116-.508.139-1.653.589-1.968.607-.316.018-1.256-.522-2.267-.665-.647-.125-1.333.131-1.824.328-.49.196-1.422.754-2.074 2.237-.652 1.482-.311 3.83-.067 4.56.244.729.625 1.924 1.273 2.796.576.984 1.34 1.667 1.659 1.899.319.232 1.219.386 1.843.067.502-.308 1.408-.485 1.766-.472.357.013 1.061.154 1.782.539.571.197 1.111.115 1.652-.105.541-.221 1.324-1.059 2.238-2.758.347-.79.505-1.217.473-1.282Z'/>
</svg>
<span class='num-like'>$row[num_like]</span>
        </div>";
}

while ($row = $resultg->fetch_assoc()){
    echo "<div>
            $row[title]
        </div>";
}

?>
</div>
<div class="block"></div>

<div class="message">
    csdvcsdv
</div>

<form id="form-auth" method="POST" action="api/auth.php">
    <input type="text" id="login" name="login" placeholder="введите логин" required><br>
    <input type="password" id="password" name="password" placeholder="введите пароль" required><br>
    <input type="submit" value="войти">
</form>
    

</body>
</html>