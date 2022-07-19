<?php
if ($_POST['select'] == "Перейти к заполнению анкеты") {
    header("Location: ../pages/firststep.php");
}
elseif ($_POST['select'] == "Перейти в панель администратора") {
    header("Location: ../admin/login.php");
}
?>