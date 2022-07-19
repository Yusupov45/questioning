<?php
session_start();
if (!empty($_SESSION['admin'])) {
    header("Location: profileslist.php");
}
?>

<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Вход в mymessenger</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
<form action="loginproc.php" method="post">
    <a href="../index.php">Вернуться назад</a>
    <label>Логин</label>
    <input type="text" name="textlogin" placeholder="Введите логин">
    <label>Пароль</label>
    <input type="password" name="textpassword" placeholder="Введите пароль">
    <input type = "submit" name="sub" value="Вход">
    <?php
    if (isset($_SESSION['logstatus'])) {
        echo $_SESSION['logstatus'];   # Вывод статуса если введенные данные неверны
        unset($_SESSION['logstatus']);
    }
    ?>
</form>
</body>
</html>
