<?php

    /*
     * 조건문에 사용하는 서브쿼리에 대해 알아보았습니다.
     * 이번에는 SELECT 문에 사용하는 쿼리문에 대해 알아보겠습니다.
     * 학생들의 모든 점수를 출력하고 옆에 필드를 더 만들어 모든 학생들의
     * 영어 점수 평균을 출력하는 것을 쿼리문으로 만들어 보겠습니다.
     *
     * 우선 영어 점수 평균을 구하는 서브쿼리문을 만듭니다.
     * 필드명은 englishAVG 로 하겠습니다.
     *
     * (SELECT avg(english) FROM schoolRecord) as englishAVG
     *
     * 앞의 쿼리문은 레코드와 함께 출력하므로 필드명을 적는 곳에 기입합니다.
     *
     * SELECT *, (SELECT avg(english) FROM schoolRecord) as englishAVG FROM schoolRecord;
     *
     * (SELECT avg(english) FROM schoolRecord) 는 모든 학생의 영어 점수 평균값을 구하며,
     * 이 값을 표시할 임시 필드명을 앨리어스(as)를 사용하여 englishAVG로 지정했습니다.
     * */

    include $_SERVER['DOCUMENT_ROOT'].'/php/108-2-connectDB.php';

    $sql = "SELECT *, (SELECT avg(english) FROM schoolRecord) as englishAVG ";
    $sql .= "FROM schoolRecord;";

    $result = $dbConnect2->query($sql);

    $dataCount = $result->num_rows;

    for ($i=0; $i<$dataCount; $i++) {
        $memberInfo = $result->fetch_array(MYSQLI_ASSOC);
        echo "학생번호 : ".$memberInfo['myMemberID'];
        echo "<br>";
        echo "클래스 : ".$memberInfo['class'];
        echo "<br>";
        echo "영어 : ".$memberInfo['english'];
        echo "<br>";
        echo "영어 평균 점수 : ".$memberInfo['englishAVG'];
        echo "<hr>";
    }

?>
