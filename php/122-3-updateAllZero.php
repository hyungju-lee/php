<?php
    /*
     * 기존 입력된 값을 기준으로 값을 더하는 방법도 있습니다.
     * 이것을 테스트하기 위해 모든 회원의 휴대전화 번호를 0 으로 변경합니다.
     * 모든 회원의 값을 변경하므로 조건문인 WHERE 문을 사용하지 않습니다.
     * */

    include $_SERVER["DOCUMENT_ROOT"]."/php/108-2-connectDB.php";

    $sql = "UPDATE myMember SET phone = 0;";
    $result = $dbConnect2->query($sql);

    if ($result) {
        echo "변경 성공";
        echo "<br>";
        $sql = "SELECT myMemberID, phone FROM myMember";
        $result = $dbConnect2->query($sql);

        $dataCount = $result->num_rows;

        for ($i=0; $i<$dataCount; $i++) {
            $memberInfo = $result->fetch_array(MYSQLI_ASSOC);
            echo "회원번호 {$memberInfo['myMemberID']}의 ";
            echo "휴대폰번호는 ".$memberInfo["phone"];
            echo "<br>";
        }
    } else {
        echo "변경 실패";
    }

    /*
     * 모든 회원의 휴대전화 번호를 0으로 만들었습니다.
     * 다음은 휴대전화번호의 값에 3을 더하는 쿼리문입니다.
     *
     * UPDATE myMember SET phone=phone+3;
     *
     * 필드를 지정한 후 대입하는 곳에 필드명을 입력하면 기존의 필드에 있는 값을 출력합니다.
     * */
?>
