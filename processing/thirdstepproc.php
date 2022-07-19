<?php
session_start();
$_SESSION['skills'] = array($_POST['checkbox1'],$_POST['checkbox2'],$_POST['checkbox3'],$_POST['checkbox4']);
$_SESSION['quality'] = $_POST['quality'];

header("Location: ../pages/fourthstep.php");



?>
