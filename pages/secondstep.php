<?php
session_start();
if(empty($_SESSION['secondname']) && empty($_SESSION['date'])) {
    header("Location: firststep.php");
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Второй шаг</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
<form action="../processing/secondstepproc.php" method="post" enctype="multipart/form-data">
    <a href="firststep.php">Вернуться к предыдущему шагу</a> <br>
    <label>Загрузите аватарку:</label>
    <input name='avatar' type='file' accept="image/jpeg,image/png"> (не более 100 Кб, доступные форматы: *.png, *.jpg/jpeg) <br>
    <label>Выберите любимый цвет</label>
    <input type="color" name="color" value="<?= @$_SESSION['color'] ?? "" ?>">
    <input type="submit" value="Перейти далее">

    <?php
    if (isset($_SESSION['secondstepstatus'])) {
        echo "<p>$_SESSION[secondstepstatus]</p> ";
        unset($_SESSION['secondstepstatus']);
    }
    ?>
</form>
</body>
</html>