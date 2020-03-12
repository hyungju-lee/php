<?php

    /*
     * schoolRecord 테이블을 생성했으므로, 학생들의 성적 정보를 입력해야 합니다.
     * 다음은 점수 정보를 schoolRecord 테이블에 입력하는 예제입니다.
     * */

    include $_SERVER["DOCUMENT_ROOT"]."/php/108-2-connectDB.php";

    $score = array();
    $score[0] = [1, 1, 90, 80, 90, 90, 100];
    $score[1] = [2, 1, 85, 90, 80, 80, 100];
    $score[2] = [3, 2, 100, 90, 70, 70, 100];
    $score[3] = [4, 2, 90, 86, 90, 70, 100];

    $cnt = 0;

    foreach ($score as $s) {
        $sql = "INSERT INTO schoolRecord";
        $sql .= "()"
    }


?>
