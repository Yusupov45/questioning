<?php
session_start();
$_SESSION['firstname'] = $_POST['firstname'];
$_SESSION['secondname'] = $_POST['secondname'];
$_SESSION['patronymic'] = $_POST['patronymic'];
$_SESSION['date'] = $_POST['date'];
$_SESSION['gender'] = $_POST['gender'];


if (!empty($_POST['secondname']) && !empty($_POST['gender']) && !empty($_POST['date'])) {
    header("Location: ../pages/secondstep.php");
}
else {
    $_SESSION['firststepstatus'] = "Введены не все данные";
    header("Location: ../pages/firststep.php");
}
?>