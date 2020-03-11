<?php

    /*
     * 데이터 정렬하기
     * 학습 내용 : 데이터를 정렬하는 방법에 대해 학습합니다.
     * 힌트 내용 : ORDER BY 명령문을 사용합니다.
     *
     * 결과물의 값이 큰 값에서 작은 값으로 정렬되어 표시되거나, 작은 값에서 큰 값으로 정렬되어 표시된다면, 더욱 편하게 결과물을 볼 수 있습니다.
     * 값을 크기에 맞게 정렬하려면 ORDER BY 를 사용해야 합니다.
     * 옵션에는 DESC와 ASC가 있으며, DESC는 큰 값에서 작은 값 순(내림차순)으로 표시하며,
     * ASC는 작은 값에서 큰 값 순(오름차순)으로 표시합니다.
     *
     * ORDER BY문 사용 방법
     * SELECT 필드명 FROM 테이블명 ORDER BY 정렬기준이 될 필드명 DESC 또는 ASC
     *
     * myMember 테이블의 데이터 이름을 기준으로 ㄱㄴㄷ 순으로 불러온다면 쿼리문은 다음과 같습니다.
     * SELECT * FROM myMember ORDER BY name ASC;
     *
     * 역순으로 불러온다면 ASC 대신 DESC를 사용합니다.
     * SELECT * FROM myMember ORDER BY name DESC;
     *
     *
     * 
     * */

    include $_SERVER["DOCUMENT_ROOT"].'/php/108-2-connectDB.php';

    $sql = "SELECT name FROM myMember ORDER BY name DESC";
    $result = $dbConnect2->query($sql);

    $dataCount = $result->num_rows;

    for ($i=0; $i<$dataCount; $i++) {
        $memberInfo = $result->fetch_array(MYSQLI_ASSOC);
        echo "이름 : ".$memberInfo["name"];
        echo "<br>";
    }
?>
