<?php

    /*
     * 결과를 보면 dropOutOld 테이블과 dropOutNew 테이블에 있는 이름이 조주흥인 레코드는 1회만 출력되었습니다.
     * 동일한 데이터이면 각 테이블에 있는 데이터라도 1회만 출력합니다.
     *
     * 중복된 정보도 함께 보려면 UNION 대신 UNION ALL 을 사용해야 합니다.
     * 다음은 UNION ALL 을 사용한 쿼리문입니다.
     *
     * (SELECT name, email FROM dropOutOld) UNION ALL (SELECT name, email FROM dropOutNew);
     *
     * 
     * */

    include $_SERVER['DOCUMENT_ROOT'].'/php/108-2-connectDB.php';

    $sql = "(SELECT name, email FROM dropOutOld)";
    $sql .= " UNION ALL "; // UNION 의 앞 뒤에 공백이 있습니다.
    $sql .= "(SELECT name, email FROM dropOutNew)";

    $result = $dbConnect2->query($sql); // 쿼리 송신

    $dataCount = $result->num_rows;

    for ($i=0; $i<$dataCount; $i++) {
        $memberInfo = $result->fetch_array(MYSQLI_ASSOC);
        echo "이름 : ".$memberInfo['name'];
        echo "<br>";
        echo "이메일 : ".$memberInfo['email'];
        echo "<br>";
    }

    // UNION ALL 을 사용하여 중복된 데이터도 모두 표시합니다.
?>
