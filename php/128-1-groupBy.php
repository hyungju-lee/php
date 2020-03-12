<?php
    /*
     * 그룹별 집계
     * 학습 내용 : 그룹별로 집계함수를 사용하는 방법에 대해 학습합니다.
     * 힌트 내용 : GROUP BY 명령문 등을 사용합니다.
     *
     * 그룹별 집계는 특정 집단의 수치를 집계함수를 이용하여 값을 표시하는 것입니다.
     * 예를 들어, schoolRecord 테이블에서 반별로 학생들의 영어 평균값을 구할 때에는 GROUP BY를 사용합니다.
     *
     * SELECT 필드명 FROM 테이블명 GROUP BY 필드명
     *
     * SELECT class, avg(english) FROM schoolRecord GROUP BY class;
     *
     * 다음은 앞의 쿼리문을 사용한 예제입니다.
     * 현재 class 필드의 값에 NULL 인 레코드도 있으므로 이를 원래의 값으로 변경 후 그룹집계 쿼리문을 실행합니다.
     * */

    include $_SERVER['DOCUMENT_ROOT'].'/php/108-2-connectDB.php';

    $sql = "UPDATE schoolRecord SET class = 1 WHERE schoolRecordID = 1";
    $dbConnect2->query($sql);

    $sql = "SELECT class, avg(english) AS avgEng FROM schoolRecord GROUP BY class";
    $result = $dbConnect2->query($sql);

    $dataCount = $result->num_rows;

    for ($i=0; $i<$dataCount; $i++) {
        $memberInfo = $result->fetch_array(MYSQLI_ASSOC);
        echo "반 : ".$memberInfo['class'];
        echo "<br>";
        echo "평균 영어 점수 : ".$memberInfo['avgEng'];
        echo "<hr>";
    }

    /*
     * class를 group by 했기 때문에 class의 값별로 영어 점수의 평균을 표시한다.
     * 2반이 가장 영어를 잘한다는 것을 알 수 있다.
     * 그럼 각 반별로 일본어 점수의 합계를 구하고 그 값 중에 170 이상인 값을 표시하겠습니다.
     *
     * 다음은 각 반의 일본어 점수의 합계를 구하는 쿼리문입니다.
     * SELECT class, sum(japanese) FROM schoolRecord GROUP BY class;
     *
     * 지금까지 조건을 제시할 때는 WHERE 을 사용했는데,
     * GROUP BY 를 사용할 때 조건을 제시하려면 WHERE 대신 HAVING 을 사용합니다.
     *
     * 다음은 각 반의 일본어 점수의 합계에서 170점 이상인 값을 표시하는 쿼리문입니다.
     * SELECT class, sum(japanese) FROM schoolRecord GROUP BY class HAVING sum(japanese) >= 170;
     *
     *
     * */
?>
