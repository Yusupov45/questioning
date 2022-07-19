<?php

class DB {
    private const USER = 'root';
    private const PASSWORD = 'root';
    private const DB = 'taskdb';    # Параметры для подключения к БД
    private const HOST = 'localhost';
    private const PORT = 3306;
    private $link;

    function __construct()  # Подключение к БД
    {
        $this->link = mysqli_connect(self::HOST,self::USER, self::PASSWORD, self::DB, self::PORT);
        if(mysqli_connect_errno()) {
            echo 'Ошибка в подключении к базе данных';
            exit();
        }
    }

    public function Get_Admin($login,$password) {   # Получение админа
        $sql = "SELECT * FROM admins WHERE login = '$login' AND password = '$password'" ;
        $result = mysqli_query($this->link, $sql);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $data;
    }

    public function Get_Profiles() {   # Получение всех пользователей
        $sql = 'SELECT `id`, `gender`,`firstname`,`secondname`,`patronymic`,`date`,`color`,`quality`,`skills` FROM profiles';
        $result = mysqli_query($this->link, $sql);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $data;
    }

    public function Get_Sorted($sort, $skills) { # сортировка по скиллам, дате и алфавиту
        $sql = "SELECT `id`, `gender`,`firstname`,`secondname`,`patronymic`,`date`,`color`,`quality`,`skills` FROM profiles
                WHERE skills LIKE '"."%".($skills[0] ?? "")."%".($skills[1] ?? "")."%".($skills[2] ?? "")."%".($skills[3] ?? "").
                "'ORDER BY ".($sort ?? "\"\"");
        $result = mysqli_query($this->link, $sql);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $data;
    }

    public function Insert($gender, $firstname, $secondname,$patronymic,$date,$avatar,$color,$quality,$skills , $photo) {
        $sql = "INSERT INTO `profiles` (`gender`, `firstname`, `secondname`, `patronymic`, `date`, `avatar`, `color`, `quality`, `skills`, `photo1`,`photo2`,`photo3`,`photo4`,`photo5`) VALUES ('$gender', '$firstname', '$secondname', '$patronymic', '$date', '$avatar', '$color', '$quality', '$skills', '$photo[0]','$photo[1]','$photo[2]','$photo[3]','$photo[4]')";
        return(mysqli_query($this->link, $sql));
    }

    public function Get_Profile_ById($id) {
        $sql = "SELECT * FROM `profiles` WHERE id = '$id'";
        $result = mysqli_query($this->link, $sql);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $data[0];

    }

    public function Get_Photos_ById($id) {
        $sql = "SELECT `photo1`,`photo2`,`photo3`,`photo4`,`photo5` FROM `profiles` WHERE id = '$id'";
        $result = mysqli_query($this->link, $sql);
        $data = mysqli_fetch_all($result, MYSQLI_ASSOC);
        return $data[0];

    }
}
?>