<?php
    /*
     * min() 함수를 사용하면 특정 필드의 최소값을 구할 수 있습니다.
     * */

    include $_SERVER['DOCUMENT_ROOT'].'/php/108-2-connectDB.php';

    $sql = "SELECT min(math) FROM schoolRecord";
    $result = $dbConnect2->query($sql);
    $score = $result->fetch_array(MYSQLI_ASSOC);
    echo '가장 낮은 수학 점수 : '.$score['min(math)'];
?>
