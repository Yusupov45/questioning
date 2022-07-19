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
    <title>Четвертый шаг</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
<form enctype="multipart/form-data" method="post" action="../processing/fourthstepproc.php">
    <a href="thirdstep.php">Вернуться назад</a> <br>
    <label>Загрузите фото</label>
    <input name='photos[]' type='file' accept="image/jpeg,image/png" multiple> (макс. 5 фото, каждая не более 1 Мб, форматы: *.png, *.jpg/jpeg) <br>
    <input type="submit" value="Отправить анкету">

    <?php
    if (isset($_SESSION['fourthstepstatus'])) {
        echo "<p>$_SESSION[fourthstepstatus]</p> ";
        unset($_SESSION['fourthstepstatus']);
    }
    ?>
</form>
</body>
</html>