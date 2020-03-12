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
        $sql .= "(myMemberID, class, english, math, science, japanese, coding)";
        $sql .= "VALUES({$s[0]}, {$s[1]}, {$s[2]}, {$s[3]}, {$s[4]}, {$s[5]}, {$s[6]})";

        $result = $dbConnect2->query($sql);
        $cnt++;

        if ($result) {
            echo $cnt.' 데이터 입력 성공'.'<br>';
        } else {
            echo $cnt.' 데이터 입력 실패'.'<br>';
        }
    }

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
?>
