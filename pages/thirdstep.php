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
    <title>Третий шаг</title>
    <link rel="stylesheet" type="text/css" href="../css/styles.css">
</head>
<body>
<form action="../processing/thirdstepproc.php" method="post">
    <a href="secondstep.php">Вернуться назад</a> <br>
    <?php
    echo "<label>Ваши личные качества</label>";
    echo "<textarea name='quality'>" . ((empty($_SESSION['quality'])) ? "" : $_SESSION['quality']) . "</textarea><br>"; ?>
    <label>Ваши навыки</label>
    <input type='checkbox' name='checkbox1' value = 'Усидчивость'  <?php if (!empty($_SESSION['skills']) && 'Усидчивость' == $_SESSION['skills'][0] ) echo 'checked'; ?>> Усидчивость
    <input type='checkbox' name='checkbox2' value='Опрятность' <?php if ( !empty($_SESSION['skills']) && 'Опрятность' == $_SESSION['skills'][1] ) echo 'checked'; ?>> Опрятность
    <input type='checkbox' name='checkbox3' value='Самообучаемость' <?php if (!empty($_SESSION['skills']) && 'Самообучаемость' == $_SESSION['skills'][2] ) echo 'checked'; ?>> Самообучаемость
    <input type='checkbox' name='checkbox4' value='Трудолюбие' <?php if (!empty($_SESSION['skills']) && 'Трудолюбие' == $_SESSION['skills'][3] ) echo 'checked'; ?>> Трудолюбие
    <input type="submit" value="Перейти далее" >

</form>
</body>
</html>
