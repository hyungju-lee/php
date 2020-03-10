<?php

    /*
     * 코드 118-1은 인덱스를 숫자로 지정하여 데이터를 출력했습니다.
     * 이번에는 필드명으로 하여 가져오겠습니다.
     * */

    include $_SERVER["DOCUMENT_ROOT"].'/php/108-2-connectDB.php';

    $sql = "SELECT name, userId FROM myMember";
    $result = $dbConnect2->query($sql);

    $dataCount = $result -> num_rows;

    for ($i = 0; $i < $dataCount; $i++) {
        $memberInfo = $result->fetch_array(MYSQLI_ASSOC);
        echo "이름 : ".$memberInfo['name'];
        echo "<br>";
        echo "아이디 : ".$memberInfo['userId'];
        echo "<br>";
    }

    /*
     * fetch_array() 메소드의 아규먼트로 MYSQLI_ASSOC 를 사용했습니다.
     * MYSQLI_ASSOC 를 사용하면 인덱스는 테이블의 필드명이 사용됩니다.
     * 인덱스를 테이블의 필드명으로 사용하여 데이터를 선택합니다.
     * */
?>
