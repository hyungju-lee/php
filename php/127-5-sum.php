<?php
    /*
     * 다음은 앞의 쿼리문을 사용하여 영어 점수의 합계를 구하는 예제입니다.
     * */

    include $_SERVER['DOCUMENT_ROOT'].'/php/108-2-connectDB.php';

    $sql = "SELECT sum(english) FROM schoolRecord";
    $result = $dbConnect2->query($sql);
    $score = $result->fetch_array(MYSQLI_ASSOC);
    echo '영어 점수 합계 : '.$score['sum(english)'];
?>
