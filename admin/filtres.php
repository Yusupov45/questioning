<?php
require_once "../database/database.php";
session_start();

function Get_Table() { # если есть фильтры то фильтрую таблицу иначе получаю все анкеты
    $db = new DB();
    if (!empty($_POST['sort']) || !empty($_POST['skills'])) {
        $data = $db->Get_Sorted(@$_POST['sort'], @$_POST['skills']);
    }
    else {
        $data = $db->Get_Profiles();
    }

    return $data;

}
?>
