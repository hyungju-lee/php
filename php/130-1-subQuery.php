<?php
    /*
     * 서브쿼리 사용하기
     * 학습 내용 : 쿼리문 안의 쿼리문인 서브쿼리에 대해 학습합니다.
     * 힌트 내용 : 쿼리문 안에 쿼리문을 작성합니다.
     *
     * schoolRecord 테이블에서 영어 점수가 가장 높은 사람의 레코드를 출력하려면 어떻게 해야 할까요?
     * 아마도 조건문에 english = max(english) 를 입력할 수 있을 것입니다.
     * 하지만 이러한 쿼리문은 에러가 발생합니다.
     * max(english) 의 값을 알기 위해서는 전체의 영어 점수를 파악해야 하고,
     * 그 중 가장 높은 값을 구해야 하기 때문입니다.
     * 그리고 집계함수는 필드를 입력하는 부분에서 사용할 수 있습니다.
     *
     * SELECT * FROM schoolRecord WHERE english = max(english);
     *
     * 앞과 같은 쿼리문은 에러가 발생합니다.
     * 이런 경우 서브쿼리를 사용해야 합니다.
     * 서브쿼리는 쿼리문 안에서 또 다른 쿼리문을 사용하는 것을 의미합니다.
     * 서브쿼리를 사용하여 가장 높은 영어 점수를 구한 후 그 점수를 조건문에 대입합니다.
     *
     * 1. 가장 높은 영어 점수를 가진 레코드를 구하기 위해 우선 가장 높은 여어 점수를 구한다.
     *  SELECT max(english) FROM schoolRecord;
     *
     * 2. 영어 점수를 조건으로 하는 레코드를 구하는 쿼리문을 작성한다.
     *  SELECT * FROM schoolRecord WHERE english = 영어점수;
     *
     * 3. 2번의 쿼리문의 조건에 대입할 값으로 1번 쿼리문을 대입한다.
     *  SELECT * FROM schoolRecord WHERE english = (SELECT max(english) FROM schoolRecord);
     *
     * 다음은 앞서 서브쿼리를 활용하여 영어 점수가 가장 높은 학생의
     * 학생번호와, 클래스(반), 영어 점수를 출력하는 예제입니다.
     * */

    include $_SERVER['DOCUMENT_ROOT'].'/php/108-2-connectDB.php';

    $sql = "SELECT * FROM schoolRecord WHERE english = ";
    $sql .= "(SELECT max(english) FROM schoolRecord)";

    $result = $dbConnect2->query($sql);

    $dataCount = $result->num_rows;

    for ($i=0; $i<$dataCount; $i++) {
        $memberInfo = $result->fetch_array(MYSQLI_ASSOC);
        echo "학생번호 : ".$memberInfo['myMemberID'];
        echo "<br>";
        echo "클래스 : ".$memberInfo['class'];
        echo "<br>";
        echo "영어 : ".$memberInfo['english'];
        echo "<hr>";
    }

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
?>
