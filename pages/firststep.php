<?php
session_start();
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Первый шаг</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
<form action="../processing/firststepproc.php" method="post">

    <label>Ваш пол*:</label>
    <select name='gender'>
        <option value='Мужской' <?php if (!empty($_SESSION['gender']) && 'man' == $_SESSION['gender'] ) echo 'selected' ?>>Мужской</option>
        <option value='Женский' <?php if (!empty($_SESSION['gender']) && 'woman' == $_SESSION['gender'] ) echo 'selected'?>>Женский</option>
    </select> <br>
    <label>Ваше имя:</label>
    <input type='text' name='firstname' placeholder='Введите имя' value="<?= ((empty($_SESSION['firstname'])) ?  "" :  $_SESSION['firstname'])?>"><br>
    <label>Ваша фамилия*:</label>
    <input type='text' name='secondname' placeholder='Введите фамилию' value="<?= ((empty($_SESSION['secondname'])) ? "" : $_SESSION['secondname'])?>"> <br>
    <label>Ваше отчество:</label>
    <input type='text' name='patronymic' placeholder='Введите отчество' value="<?=((empty($_SESSION['patronymic'])) ? "" : $_SESSION['patronymic'])?>"> <br>
    <label>Дата рождения*:</label>
    <input type='date' name='date' placeholder='Введите дату' value="<?=((empty($_SESSION['date'])) ? "" : $_SESSION['date'])?>"> <br>
    <p>*-обязательные поля</p>
    <input type="submit" value="Перейти далее">
    <?php
    if (isset($_SESSION['firststepstatus'])) {
        echo "<p>$_SESSION[firststepstatus]</p> ";
        unset($_SESSION['firststepstatus']);
    }
    ?>
</form>
</body>
</html>
