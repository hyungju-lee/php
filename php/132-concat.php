<?php
    /*
     * 서로 다른 필드의 값을 합쳐서 출력하기
     * 학습 내용 : 테이블에서 출력한 결과물을 문자열과 합쳐서 출력하는 방법에 대해 학습합니다.
     * 힌트 내용 : CONCAT 옵션을 사용합니다.
     *
     * 테이블의 서로 다른 필드에 있는 값을 합쳐서 출력할 수도 있습니다.
     * 이 기능을 구현하려면 concat 이라는 기능을 사용합니다.
     * 필드값뿐만 아니라 일반 문자열을 합쳐서 출력할 수 있습니다.
     *
     * CONCAT 사용 방법
     * SELECT CONCAT(합칠 문자열 또는 필드, 합칠 문자열 또는 필드) FROM 테이블명
     *
     * 다음은 CONCAT 을 이용하여 '[누구]의 이메일 주소는 [무엇]입니다.' 라는 문구를 출력하는 쿼리문입니다.
     * SELECT concat(name,'의 이메일 주소는', email, '입니다.') FROM myMember;
     *
     * */

    include $_SERVER['DOCUMENT_ROOT'].'/php/108-2-connectDB.php';

    $sql = "SELECT CONCAT(name, '의 이메일 주소는 ', email, '입니다.') ";
    $sql .= "AS word FROM myMember;";

    $result = $dbConnect2->query($sql);

    $dataCount = $result->num_rows;

    for ($i=0; $i<$dataCount; $i++) {
        $concat = $result->fetch_array(MYSQLI_ASSOC);
        echo $concat['word'];
        echo "<br>";
    }

    /*
     * 필드 Key 를 보면 'MUL' 이 표시된 것을 알 수 있습니다.
     * PRI는 primary key 를 의미하며 MUL은 해당 필드에 여러 가지 값이 들어갈 수 있음을 의미합니다.
     * 지금은 레코드의 수가 매우 적어서 데이터를 출력하는 데 속도의 차이가 없지만
     * 대규모 서비스에서는 데이터를 불러올 때 차이가 많이 발생합니다.
     * 자주 쓰이는 필드라면 인덱스를 적용하면 속도면에서 좋습니다.
     * */
?>
