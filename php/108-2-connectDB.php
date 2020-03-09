<?php
    /*
     * 데이터베이스 생성하기
     * 학습 내용 : 데이터베이스를 생성하는 방법에 대해 학습합니다.
     * 힌트 내용 : 데이터베이스를 생성 명령문은 CREATE DATABASE 입니다.
     *
     * MySQL에서 사용할 데이터베이스를 생성하겠습니다.
     * 보통 1개의 서비스에 1개의 데이터베이스를 사용합니다.
     *
     * CREATE DATABASE 데이터베이스명
     *
     * 위와 같은 데이터베이스에서 사용하는 명령문을 쿼리문이라고 부릅니다.
     * 생성할 데이터베이스의 이름은 [php200Example]로 하겠습니다.
     * 쿼리문을 실행하면 mysqli 클래스 내에 있는 query 메소드를 사용합니다.
     * query 메소드의 아규먼트로 쿼리문을 입력합니다.
     *
     * query("쿼리문");
     *
     *
     * */

    $host = "localhost";
    $user = "root";
    $pw = "";
    $dbName = "php200Example2";
    $dbConnect2 = new mysqli($host, $user, $pw, $dbName);
    $dbConnect2->set_charset("utf8");

    if (mysqli_connect_errno()) {
        echo "데이터베이스 {$dbName}에 접속 실패";
    } else {
        echo "데이터베이스 {$dbName}에 접속 성공";
    }
?>

