<?php

    /*
     * 두 테이블에 데이터를 입력했습니다.
     * 이제 UNION 명령문에 대해 알아보겠습니다.
     *
     * UNION 사용 방법
     * (첫 번째 테이블의 SELECT 문) UNION (두번째 테이블의 SELECT 문)
     *
     * (SELECT 필드명 FROM dropOutOld) UNION (SELECT 필드명 FROM dropOutNew);
     *
     * 서로 다른 테이블의 SELECT 문을 작성하고 그 사이에 UNION 이 위치하도록 합니다.
     * 단, SELECT 문에서 불러올 필드명을 기입할 때에는 필드의 수가 같아야 한다는 점에 주의해야 합니다.
     * 첫 번째 테이블에서 필드 3개를 선택하고,
     * 두 번째 테이블에서 필드 3개을 선택하지 않으면 문법 에러가 발생합니다.
     *
     * 다음은 UNION을 사용하여 두 테이블에 있는 데이터를 출력하는 쿼리문입니다.
     *
     * (SELECT name, email FROM dropOutOld) UNION (SELECT name, email FROM dropOutNew);
     *
     * 
     * */

    include $_SERVER['DOCUMENT_ROOT'].'/php/108-2-connectDB.php';

    $sql = "(SELECT name, email FROM dropOutOld)";
    $sql .= " UNION "; // UNION 의 앞 뒤에 공백이 있습니다.
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
?>
