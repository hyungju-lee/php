<?php
    $host = "localhost";
    $user = "root";
    $pw = "";
    $database = "php200project";
    $port = 3307;
    $dbConnect = new mysqli($host, $user, $pw, $database, $port);
    $dbConnect -> set_charset("utf8");

    if (mysqli_connect_errno()) {
        echo "데이터베이스 접속 실패";
    }
?>