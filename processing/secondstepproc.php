<?php
session_start();

$_SESSION['color'] = $_POST['color'];
$size = 102400;

if (!empty($_FILES['avatar']['name'])) {
    if ($_FILES['avatar']['size'] < $size) {
        $path = '../uploads/' . time() . $_FILES['avatar']['name'];
        $result = false;
        if ($_FILES['avatar']['type'] == 'image/png') {  #проверяю типы а дальше сжимаю аватарку
            $image = imagecreatefrompng($_FILES['avatar']['tmp_name']);
            $imageResized = imagescale($image,60,60);
            $result = imagepng($imageResized, $path);
        }
        elseif ($_FILES['avatar']['type'] == 'image/jpg' || $_FILES['avatar']['type'] == 'image/jpeg') {
            $image = imagecreatefromjpeg($_FILES['avatar']['tmp_name']);
            $imageResized = imagescale($image,60,60);
            $result = imagejpeg($imageResized, $path);
        }
        if (!$result) {
            $_SESSION['secondstepstatus'] = 'Ошибка при загрузке аватарки';
            header("Location: ../pages/secondstep.php");
            exit();
        }
        $_SESSION['pathava'] = $path;
        header("Location: ../pages/thirdstep.php");
    }
    else {
        $_SESSION['secondstepstatus'] = 'Неверный формат или размер аватарки';
        header("Location: ../pages/secondstep.php");
        exit();
    }
}
else {
    header("Location: ../pages/thirdstep.php");
}
?>