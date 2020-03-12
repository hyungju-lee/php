<?php

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

    include $_SERVER["DOCUMENT_ROOT"].'/php/108-2-connectDB.php';

    $sql = "SELECT class, sum(japanese) FROM schoolRecord GROUP BY class ";
    $sql .= "HAVING sum(japanese) >= 170";
    $result = $dbConnect2->query($sql);

    $dataCount = $result->num_rows;

    for ($i = 0; $i<$dataCount; $i++) {
        $memberInfo = $result->fetch_array(MYSQLI_ASSOC);
        echo "반 : ".$memberInfo["class"];
        echo "<br>";
        echo "합산 점수 : ".$memberInfo['sum(japanese)'];
        echo "<hr>";
    }
?>
