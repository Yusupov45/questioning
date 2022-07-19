<?php
session_start();
session_unset(); #удаляем сессию при выходе из личного кабинета
header("Location: login.php");
?>
