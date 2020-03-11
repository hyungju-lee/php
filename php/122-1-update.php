<?php
    /*
     * 데이터의 값 변경하기
     * 학습 내용 : 레코드의 값을 변경하는 방법에 대해 학습합니다.
     * 힌트 내용 : UPDATE 명령문을 사용합니다.
     *
     * 데이터베이스에 입력한 데이터를 수정하는 일은 매우 자주 발생합니다.
     * 게임을 예로 들면 경험치를 충족하여 다음 레벨로 데이터를 변경하거나 회원이 개명하여 회원명을 변경하길 원할 때가 그렇습니다.
     *
     * UPDATE 문 사용 방법
     * UPDATE 테이블명 SET 필드명 값 조건
     *
     * UPDATE 문을 사용할 때는 조심해야 합니다.
     * 조건문을 사용하지 않으면 테이블의 모든 레코드가 동일하게 변경되기 때문입니다.
     *
     * 다음은 myMemberID가 4번인 고객의 휴대전화번호를 0으로 변경하는 예제입니다.
     * */

    include $_SERVER["DOCUMENT_ROOT"].'/php/108-2-connectDB.php';

    $sql = "UPDATE myMember SET phone = 0 WHERE myMemberID = 4";
    $result = $dbConnect2->query($sql);

    if ($result) {
        echo "변경 성공";
        echo "<br>";
        $sql = "SELECT phone FROM myMember WHERE myMemberID = 4";
        $result = $dbConnect2 -> query($sql);

        $memberInfo = $result->fetch_array(MYSQLI_ASSOC);
        echo "회원번호 4의 휴대폰번호는 ".$memberInfo["phone"];
    } else {
        echo "변경 실패";
    }

    /*
     * UPDATE 문을 사용하여 한 번에 여러 필드의 값을 변경할 수 있습니다.
     * 4번 회원의 휴대전화번호를 원래의 값으로 변경하고,
     * 아이디를 minhoo에서 minhu로 변경하겠습니다.
     *
     * 쿼리문은 다음과 같습니다.
     * UPDATE myMember SET phone = "010-1234-5678", userId="minhu" WHERE myMemberID = 4;
     *
     * */
?>
