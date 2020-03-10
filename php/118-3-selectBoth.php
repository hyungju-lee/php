<?php
    include $_SERVER["DOCUMENT_ROOT"].'/php/108-2-connectDB.php';

    $sql = "SELECT name, userId FROM myMember";
    $result = $dbConnect2 -> query($sql);

    $dataCount = $result -> num_rows;

    for ($i = 0; $i < $dataCount; $i++) {
        $memberInfo = $result -> fetch_array(MYSQLI_BOTH);
        echo "이름 : ".$memberInfo[0];
        echo "<br>";
        echo "아이디 : ".$memberInfo["userId"];
        echo "<br>";
    }

    /*
     * fetch_array() 메소드의 아규먼트로 MYSQLI_BOTH 를 사용했습니다.
     * MYSQLI_BOTH 를 사용하면 인덱스로 테이블의 필드명을 제공하고 숫자로도 제공합니다.
     * */
?>
