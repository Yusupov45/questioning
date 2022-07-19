<?php
session_start();
require_once "../database/database.php";

function reArrayFiles(&$file_post) {

    $file_ary = array();
    $file_count = count($file_post['name']);
    $file_keys = array_keys($file_post);

    for ($i=0; $i<$file_count; $i++) {
        foreach ($file_keys as $key) {
            $file_ary[$i][$key] = $file_post[$key][$i];
        }
    }

    return $file_ary;
}

$sizephoto=1024000;

$files = reArrayFiles($_FILES['photos']);

$pathsphotos = array();

if (!empty($files[0]['name'])) {
    if ((count($files) <= 5) && (count($files) > 0)) {
        foreach ($files as $photo) {
            if ($photo['size'] < $sizephoto) {
                $path='../uploads/'. time() . $photo['name'];
                $result = false;
                if ($photo['type'] == "image/png") { # проверяю тип
                    $image = imagecreatefrompng($photo['tmp_name']);
                    $sizes = getimagesize($photo['tmp_name']);
                    if ($sizes[0]>=$sizes[1]) {   # проверяю соотношение сторон и дальше сжимаю фотку пропорционально
                        $imageResized = imagescale($image,600,(int)($sizes[1]/$sizes[0]*600));
                    }
                    else {
                        $imageResized = imagescale($image,(int)($sizes[0]/$sizes[1]*700),700);
                    }
                    $result = imagepng($imageResized, $path);
                }
                elseif ($photo['type'] == "image/jpg" || $photo['type'] == "image/jpeg") {# проверяю тип
                    $image = imagecreatefromjpeg($photo['tmp_name']);
                    $sizes = getimagesize($photo['tmp_name']);
                    if ($sizes[0]>=$sizes[1]) { # проверяю соотношение сторон и дальше сжимаю фотку пропорционально
                        $imageResized = imagescale($image,600,(int)($sizes[1]/$sizes[0]*600));
                    }
                    else {
                        $imageResized = imagescale($image,(int)($sizes[0]/$sizes[1]*700),700);
                    }
                    $result = imagejpeg($imageResized, $path);
                }


                if (!$result) {
                    $_SESSION['fourthstepstatus'] = 'Ошибка при загрузке фото';
                    header("Location: ../pages/fourthstep.php");
                    exit();
                }

                array_push($pathsphotos,$path); #закидываю путь фотки в массив с путями
            }
            else {
                $_SESSION['fourthstepstatus'] = 'Неверный формат или размер фото';
                header("Location: ../pages/fourthstep.php");
                exit();
            }
        }
    }
    else {
        $_SESSION['fourthstepstatus'] = 'Количество фото больше 5';
        header("Location: ../pages/fourthstep.php");
        exit();
    }
}

$skills = "";
foreach ($_SESSION['skills'] as $skill) {
    $skills = $skills." ".$skill;
}
$gender = $_SESSION['gender'];
$firstname= $_SESSION['firstname'];
$secondname = $_SESSION['secondname'];
$patronymic = $_SESSION['patronymic'];
$date = $_SESSION['date'];
$pathava = empty($_SESSION['pathava']) ? "" : $_SESSION['pathava'];
$color = $_SESSION['color'];
$quality = $_SESSION['quality'];

$db = new DB();
if($db->Insert($gender, $firstname, $secondname,$patronymic,$date,$pathava,$color,$quality,$skills ,$pathsphotos)) {
    header("Location: ../index.php");
    session_unset();
}


?>