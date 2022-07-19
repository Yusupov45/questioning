<?php
    session_start();
    if (empty($_SESSION['admin'])) {
        header("Location: login.php");
        exit();
    }
    require_once "filtres.php";

    if(!empty($_POST['resetfiltres'])) { # если сбрасываем фильтры
        $_SESSION['data'] = Get_Table();
        $data = &$_SESSION['data'];
    }
    elseif (empty($_SESSION['data']) || !empty($_POST['buttonfiltres'])) { #если примению фильтр то получаю новые данные иначе работаю со старыми для пагинации
        $_SESSION['data'] = Get_Table();
        $data = &$_SESSION['data'];
    }
    else{
        $data = &$_SESSION['data'];
    }

    $count = 5;
    $count_pages = ceil(count($data)/$count); #кол-во страниц для пагинации
    $page = $_GET['page'] ?? 0; # номер страницы

?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Список анкет</title>
    <link rel="stylesheet" type="text/css" href="../css/minimal-table.css">
</head>
<body>
<form action="profile.php" method="post">
    <a href="exit.php">Выход</a>
    <table>
        <tr>
            <td>id</td>
            <td>Пол</td>
            <td>Имя</td>
            <td>Фамилия</td>
            <td>Отчество</td>
            <td>Дата рождения</td>
            <td>Цвет</td>
            <td>Качества</td>
            <td>Навыки</td>
            <td>Перейти</td>
        </tr>
        <?php
        for($i = $page*$count; $i<($page+1)*$count; $i++) { # вывожу по 5 анкет
            if ($i >= count($data)) {
                break;
            }
            echo "<tr>";
            foreach ($data[$i] as $field) {
                echo "<td>";
                echo (empty($field) ? " " : $field);
                echo "</td>";
            }
            echo "<td>";
            echo "<input type='submit' value='{$data[$i]['id']}' name='id'>";
            echo "</td>";
            echo "<tr>";
        }
        ?>
    </table>
</form> <br>

<p> Номер страницы :
<?php for($i = 0; $i < $count_pages; $i++):?>
    <a href="profileslist.php?page=<?php echo $i?>"><button><?php echo $i+1 ?></button></a>  <!-- кнопки для пагинации -->
<?php endfor; ?> </p> <br> <br>

<form action="profileslist.php" method="post">
    <label>Сортировка</label> <br>
    <label>По дате:</label> <br>
    <label>По убыванию</label>
    <input type="radio" value="date DESC" name="sort">
    <label>По возрастанию</label>
    <input type="radio" value="date ASC" name="sort"> <br> <br>
    <label>По фамилии:</label> <br>
    <label>По убыванию</label>
    <input type="radio" value="secondname DESC" name="sort">
    <label>По возрастанию</label>
    <input type="radio" value="secondname ASC" name="sort"><br> <br>
    <label>Фильтр</label> <br>
    <label>Усидчивость</label>
    <input type="checkbox" value="Усидчивость" name="skills[]"> <br>
    <label>Опрятность</label>
    <input type="checkbox" value="Опрятность" name="skills[]"> <br>
    <label>Самообучаемость</label>
    <input type="checkbox" value="Самообучаемость" name="skills[]"> <br>
    <label>Трудолюбие</label>
    <input type="checkbox" value="Трудолюбие" name="skills[]"> <br>
    <input type="submit" value="Применить" name="buttonfiltres">
</form>

<form action="profileslist.php" method="post">
    <input type="submit" value="Сбросить фильтр" name="resetfiltres">
</form>


</body>
</html>
