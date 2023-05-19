<?php 
    $login = filter_var(trim($_POST['login']),
    FILTER_SANITIZE_STRING);
    $name = filter_var(trim($_POST['mail']),
    FILTER_SANITIZE_STRING);
    $mail = filter_var(trim($_POST['name']),
    FILTER_SANITIZE_STRING);
    $pass = filter_var(trim($_POST['pass']),
    FILTER_SANITIZE_STRING);

    if(mb_strlen($login) < 5 || mb_strlen($login) > 16) {
        echo "Недопустимая длина логина";
        exit();
    }
    else if(mb_strlen($name) < 8 || mb_strlen($mail) > 16) {
        echo "Недопустимая длина mail";
        exit();
    }
    else if(mb_strlen($mail) < 2 || mb_strlen($name) > 35) {
        echo "Недопустимая длина имени";
        exit();
    }
    else if(mb_strlen($pass) < 4 || mb_strlen($pass) > 16) {
        echo "Недопустимая длина пароля";
        exit();
    }

    $pass = md5($pass."mkeo38fdkvn");

    $mysql = new mysqli('localhost', 'root', 'root', 'register-db');
    $mysql->query("INSERT INTO `users` (`login`, `mail`, `name`, `pass`)
    VALUES('$login', '$mail', '$name', '$pass')");

    $mysql->close();

?>