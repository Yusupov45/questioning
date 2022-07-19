<?php
session_start();
require_once '../database/database.php';

$login = $_POST['textlogin'];
$password = $_POST['textpassword'];   # Данные из login.php
$db = new DB();
echo md5($password);
$data = $db->Get_Admin($login, md5($password));


if (isset($data[0]['login'])) {
    header("Location: profileslist.php");
    $_SESSION['admin'] = $data[0];
}
else {
    $_SESSION['logstatus'] = "Неверный логин или пароль";
    header("Location: login.php");
}
?>