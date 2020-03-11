<?php
    /*
     * 다수의 조건 사용하기
     * 학습 내용 : WHERE 문에서 여러 레코드에 대한 조건을 지정하는 방법에 대해 학습합니다.
     * 힌트 내용 : AND, OR, IN 명령문을 사용합니다.
     *
     * WHERE 문을 사용하여 회원번호가 1번, 2번, 3번인 회원의 데이터를 불러온다면 다음과 같은 쿼리문을 사용합니다.
     * WHERE myMemberID = 1 OR myMemberID = 2 OR myMemberID = 3;
     *
     * 또는 >=, <= 기호를 사용하여 다음과 같이 사용할 수 있습니다.
     * WHERE myMemberID >= 1 AND myMemberID <= 3;
     *
     * WHERE 문을 사용한다면 앞과 같이 작성해야 합니다.
     * 하지만 IN을 사용하면 다음과 같이 매우 간단하게 처리할 수 있습니다.
     * WHERE myMemberID IN (1, 2, 3)
     *
     *
     * */

    include $_SERVER["DOCUMENT_ROOT"]."/php/108-2-connectDB.php";

    $sql = "SELECT myMemberID, name FROM myMember ";
    $sql .= " WHERE myMemberID in (1, 2, 3)";

    $result = $dbConnect2->query($sql);

    if ($result) {
        $dataCount = $result->num_rows;

        for ($i=0; $i<$dataCount; $i++) {
            $memberInfo = $result->fetch_array(MYSQLI_ASSOC);
            echo "회원번호 {$memberInfo['myMemberID']}의 이름은 ".$memberInfo['name'];
            echo "<br>";
        }
    } else {
        echo "실패";
    }

?>
