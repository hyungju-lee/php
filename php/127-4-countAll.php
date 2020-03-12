<?php

    /*
     * 다음은 count(*) 를 사용해서 NULL 인 데이터의 수도 포함한 결과를 보이는지 확인하는 예제입니다.
     * */

    include $_SERVER["DOCUMENT_ROOT"]."/php/108-2-connectDB.php";

    $sql = "SELECT count(*) FROM schoolRecord";
    $result = $dbConnect2->query($sql);

    $reviewInfo = $result->fetch_array(MYSQLI_ASSOC);
    echo "레코드 수 : ".$reviewInfo["count(*)"];


?>
