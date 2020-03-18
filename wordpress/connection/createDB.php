<?php
    date_default_timezone_set('Asia/Seoul');
    $host = "localhost";
    $user = "root";
    $pw = "";
    $database = null;
    $port = 3307;

    $dbConnect = new mysqli($host, $user, $pw, $database, $port);

    $dbConnect -> set_charset("utf8");

    if (mysqli_connect_errno()) {
        echo "데이터베이스 접속 실패";
    } else {
        $sql = "CREATE DATABASE hyungju12";
        $res = $dbConnect->query($sql);

        if ($res) {
            echo "데이터베이스 생성 완료";
        } else {
            echo "데이터베이스 생성 실패";
        }
    }
?>