<?php
    /*
     * 2개 이상의 테이블 묶어 사용하기
     * 학습 내용 : 2개의 테이블을 하나의 테이블인 것처럼 사용하는 방법에 대해 학습합니다.
     * 힌트 내용 : UNION 명령문 등을 사용합니다.
     *
     * 2개 이상의 테이블을 사용할 때 JOIN을 사용했습니다.
     * JOIN은 일치하는 특정 필드를 기준으로 테이블과 테이블을 연결했습니다.
     * UNION은 사용하려는 테이블들을 하나의 테이블인 것처럼 사용하게 해주는 기능을 제공합니다.
     *
     * 이해하기 쉽게 테이블을 2개 생성합니다.
     * 하나의 테이블은 2017년에 탈퇴한 회원의 이름과 이메일 정보를 담고 있으며,
     * 또 하나의 테이블은 2018년에 탈퇴한 회원의 이름과 이메일 정보를 담고 있습니다.
     * 어떤 회원은 2017년도에 탈퇴했고, 2018년에 가입한 후 또 탈퇴를 해서
     * 2017년도 테이블 2018년도 테이블에 존재합니다.
     * 그리고 2017년도와 2018년도에 탈퇴한 회원에게 다시 이용해달라고 요청하는 이메일을 보내기 위해
     * 데이터를 출력하는 작업을 해야 합니다.
     *
     * 2017년도 탈퇴 회원의 테이블의 이름은 dropOutOld 이며,
     * 2018년도 탈퇴 회원의 테이블 이름은 dropOutNew 로 하겠습니다.
     *
     * 다음은 dropOutNew 테이블과 dropOutOld 테이블의 생성 쿼리문입니다.
     * */

    // dropOutOld 테이블 생성 쿼리문
    //CREATE TABLE dropOutOld(
    //    dropOutOldID INT UNSIGNED NOT NULL AUTO_INCREMENT,
    //    name VARCHAR(10) NOT NULL,
    //    email VARCHAR(30) NOT NULL,
    //    PRIMARY KEY (dropOutOldID)
    //) CHARSET = utf8 COMMENT '2017년 탈퇴 회원';

    // dropOutNew 테이블 생성 쿼리문
    //CREATE TABLE dropOutNew(
    //    dropOutOldID INT UNSIGNED NOT NULL AUTO_INCREMENT,
    //    name VARCHAR(10) NOT NULL,
    //    email VARCHAR(30) NOT NULL,
    //    PRIMARY KEY (dropOutOldID)
    //) CHARSET = utf8 COMMENT '2018년 탈퇴 회원';

    include $_SERVER["DOCUMENT_ROOT"]."/php/108-2-connectDB.php";

    $dropOutOld = "CREATE TABLE dropOutOld(";
    $dropOutOld .= "dropOutOldID INT UNSIGNED NOT NULL AUTO_INCREMENT,";
    $dropOutOld .= "name VARCHAR(10) NOT NULL,";
    $dropOutOld .= "email VARCHAR(30) NOT NULL,";
    $dropOutOld .= "PRIMARY KEY (dropOutOldID)";
    $dropOutOld .= ") CHARSET = utf8 COMMENT '2017년 탈퇴 회원';";

    $dropOutNew = "CREATE TABLE dropOutNew(";
    $dropOutNew .= "dropOutNewID INT UNSIGNED NOT NULL AUTO_INCREMENT,";
    $dropOutNew .= "name VARCHAR(10) NOT NULL,";
    $dropOutNew .= "email VARCHAR(30) NOT NULL,";
    $dropOutNew .= "PRIMARY KEY (dropOutNewID)";
    $dropOutNew .= ") CHARSET = utf8 COMMENT '2018년 탈퇴 회원';";

    $sqList = array();

    $sqList['dropOutOld'] = $dropOutOld;
    $sqList['dropOutNew'] = $dropOutNew;

    foreach ($sqList as $key => $sl) {
        $result = $dbConnect2->query($sl);

        if ($result) {
            echo "{$key} 테이블 생성 완료";
        } else {
            echo "{$key} 테이블 생성 실패";
        }

        echo "<br>";
    }




?>
