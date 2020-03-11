<?php

    /*
     * UPDATE 문을 사용하여 한 번에 여러 필드의 값을 변경할 수 있습니다.
     * 4번 회원의 휴대전화번호를 원래의 값으로 변경하고,
     * 아이디를 minhoo에서 minhu로 변경하겠습니다.
     *
     * 쿼리문은 다음과 같습니다.
     * UPDATE myMember SET phone = "010-1234-5678", userId="minhu" WHERE myMemberID = 4;
     *
     * */

    include $_SERVER["DOCUMENT_ROOT"]."/php/108-2-connectDB.php";

    $sql = "UPDATE myMember SET phone = '010-1234-5678',";
    $sql .= " userId='minhu' WHERE myMemberId = 4;";

    $result = $dbConnect2->query($sql);

    if ($result) {
        echo "변경 성공";
        echo "<br>";
        $sql = "SELECT userId, phone FROM myMember WHERE myMemberID = 4";
        $result = $dbConnect2->query($sql);

        $memberInfo = $result->fetch_array(MYSQLI_ASSOC);
        echo "회원번호 4의 휴대폰번호는 ".$memberInfo["phone"];
        echo "<br>";
        echo "회원번호 4의 변경된 ID는 ".$memberInfo["userId"];
    } else {
        echo "변경 실패";
    }

    /*
     * 기존 입력된 값을 기준으로 값을 더하는 방법도 있습니다.
     * 이것을 테스트하기 위해 모든 회원의 휴대전화 번호를 0 으로 변경합니다.
     * 모든 회원의 값을 변경하므로 조건문인 WHERE 문을 사용하지 않습니다.
     * */
?>
