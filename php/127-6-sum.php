<?php
    /*
     * avg() 함수를 사용하면 특정 필드의 평균값을 구할 수 있습니다.
     * 다음은 avg() 함수를 사용한 쿼리문입니다.
     *
     * SELECT avg(math) FROM schoolRecord;
     * */

    include $_SERVER['DOCUMENT_ROOT'].'/php/108-2-connectDB.php';

    $sql = "SELECT avg(math) FROM schoolRecord";
    $result = $dbConnect2->query($sql);
    $score = $result->fetch_array(MYSQLI_ASSOC);
    echo '수학 점수 평균 : '.$score['avg(math)'];
?>
