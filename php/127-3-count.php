<?php

    /*
     * 집계 함수의 종류
     * 
     * count(필드명) : 레코드의 개수를 표시(값이 null인 경우 포함되지 않음)
     * count(*) : 레코드의 개수를 표시(null을 포함)
     * sum(필드명) : 필드 값의 합계를 표시
     * avg(필드명) : 필드 값의 평균을 표시
     * max(필드명) : 필드 값의 최대값을 표시
     * min(필드명) : 필드 값의 최소값을 표시
     *
     * SELECT count(class) FROM schoolRecord;
     *
     * 
     * */

    include $_SERVER["DOCUMENT_ROOT"]."/php/108-2-connectDB.php";

    function schoolRecord(){
        global $dbConnect2;
        $sql = "SELECT count(class) FROM schoolRecord";
        $result = $dbConnect2->query($sql);
        $reviewInfo = $result->fetch_array(MYSQLI_ASSOC);
        echo "class 필드를 기준으로 한 레코드 수 : ";
        echo $reviewInfo['count(class)'];
        echo "<br>";
    }

    schoolRecord();

    // schoolRecordID 가 1인 레코드의  class 필드 값을 NULL로 변경
    $sql = "UPDATE schoolRecord SET class = NULL WHERE schoolRecordID = 1";
    $dbConnect2->query($sql);

    schoolRecord();
?>
