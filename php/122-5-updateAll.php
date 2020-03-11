<?php
    /*
     * 필드를 지정한 후 대입하는 곳에 필드명을 입력하면 기존의 필드에 있는 값을 출력합니다.
     * 그 값에 3을 더한 값이 대입됩니다.
     *
     * 실제로 휴대전화번호가 0이 되거나 3이 되는 일은 없지만,
     * 기존의 필드값을 필드에 대입할 수 있다는 것을 알아보았습니다.
     * 다시 모든 회원의 휴대전화 번호를 '010-1234-5678'로 변경하겠습니다.
     * 사용하는 쿼리문은 다음과 같습니다.
     *
     * UPDATE myMember SET phone = '010-1234-5678'
     *
     * 
     * */

    include $_SERVER["DOCUMENT_ROOT"].'/php/108-2-connectDB.php';

    $sql = "UPDATE myMember SET phone = '010-1234-5667';";
    $result = $dbConnect2->query($sql);

    if ($result) {
        echo "변경 성공";
        echo "<br>";
        $sql = "SELECT myMemberID, phone FROM myMember";
        $result = $dbConnect2->query($sql);

        $dataCount = $result->num_rows;

        for ($i=0; $i<$dataCount; $i++) {
            $memberInfo = $result->fetch_array(MYSQLI_ASSOC);
            echo "회원번호 {$memberInfo['myMemberID']}의 휴대폰번호는 ".$memberInfo['phone'];
            echo "<br>";
        }
    } else {
        echo "변경 실패";
    }
?>
