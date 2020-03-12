<?php
    /*
     * max() 함수를 사용하면 특정 필드의 최대값을 구할 수 있습니다.
     * */

    include $_SERVER['DOCUMENT_ROOT'].'/php/108-2-connectDB.php';

    $sql = "SELECT max(japanese) FROM schoolRecord";
    $result = $dbConnect2->query($sql);
    $score = $result->fetch_array(MYSQLI_ASSOC);
    echo '가장 높은 일본어 점수 : '.$score['max(japanese)'];
?>
