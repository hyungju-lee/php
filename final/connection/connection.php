<?php
    date_default_timezone_set('Asia/Seoul');
    $host = "localhost";
    $user = "root";
    $pw = "";
    $database = "hyungju12";
    $port = 3307;
    $dbConnect = new mysqli($host, $user, $pw, $database, $port);
    $dbConnect -> set_charset("utf8");

//    $host = "localhost";
//    $user = "hyungju12";
//    $pw = "비밀번호~~!!";
//    $database = "hyungju12";
//    $port = 3307;
//    $dbConnect = new mysqli($host, $user, $pw, $database);
//    $dbConnect -> set_charset("utf8");

    if (mysqli_connect_errno()) {
        echo "데이터베이스 접속 실패";
    }
?>