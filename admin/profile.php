<?php
session_start();
if (empty($_SESSION['admin']) || empty($_POST['id'])) {
    header("Location: login.php");
    exit();
}
require_once "../database/database.php";
$db = new DB();
$profile = $db->Get_Profile_ById((int)$_POST['id']);
$photos = $db->Get_Photos_ById((int)$_POST['id']);

?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/photo.css">
    <title>Анкета</title>
</head>
<body>
    <a href="profileslist.php">Вернуться назад</a> <br>
    <label>Аватарка</label>
    <img src="<?= $profile['avatar']?>" alt="Нет фото" class="ava"> <br>
    <label>Имя: </label>
    <?php echo $profile['firstname']?> <br>
    <label>Фамилия: </label>
    <?php echo $profile['secondname']?> <br>
    <label>Отчество: </label>
    <?php echo $profile['patronymic']?> <br>
    <label>Пол: </label>
    <?php echo $profile['gender']?> <br>
    <label>Дата рождения: </label>
    <?php echo $profile['date']?> <br>
    <label>Любимый цвет: </label>
    <figure class="color" style="background: <?= $profile['color'] ?>"></figure><br>
    <label>Личные качества: </label>
    <?php echo $profile['quality']?> <br>
    <label>Навыки: </label>
    <?php echo $profile['skills']?> <br>
    <label>Фотографии: </label> <br>
    <?php
    foreach ($photos as $photo) {
        if ($photo != NULL) {
            echo "<img src='$photo'> <br>";
        }
    }
    ?>
</body>
</html>