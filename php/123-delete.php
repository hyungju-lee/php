<?php
    /*
     * 데이터 삭제하기
     * 학습 내용 : 레코드를 삭제하는 방법에 대해 학습합니다.
     * 힌트 내용 : DELETE 명령문을 사용합니다.
     *
     * 레코드 삭제에 대해 알아보겠습니다.
     * 레코드를 삭제하려면 DELETE 문을 사용해야 합니다.
     * 운영 중인 서비스의 회원이 탈퇴한 경우 해당하는 고객의 정보는 지워져야 합니다.
     * 이러한 경우 DELETE 문을 사용하여 레코드를 삭제할 수 있습니다.
     *
     * 레코드 삭제 방법
     * DELETE FROM 테이블명 조건
     *
     * 다음은 4번 회원의 레코드를 삭제하는 예제입니다.
     *
     * DELETE FROM myMember WHERE myMemberId = 4;
     *
     * 다음은 앞의 쿼리문을 활용하여 회원번호 4번의 레코드를 삭제하는 예제입니다.
     * */

    include $_SERVER["DOCUMENT_ROOT"].'/php/108-2-connectDB.php';

    $sql = "DELETE FROM myMember WHERE myMemberId = 4";
    $result = $dbConnect2->query($sql);

    if ($result) {
        echo "삭제 성공";
        echo "<br>";
        $sql = "SELECT myMemberID, phone FROM myMember";
        $result = $dbConnect2->query($sql);
        
        $dataCount = $result->num_rows;
        
        echo "현재의 회원 <br>";
        for ($i=0; $i<$dataCount; $i++) {
            $memberInfo = $result->fetch_array(MYSQLI_ASSOC);
            echo "회원번호 {$memberInfo['myMemberID']}";
            echo "<br>";
        }
    } else {
        echo "삭제 실패";
    }

    /*
     * 결과를 보면 4번 회원만 없는 것을 알 수 있습니다.
     * DELETE 문도 WHERE 문 없이 사용하면 테이블의 모든 레코드가 삭제되므로 주의하여 사용해야 합니다.
     * */
?>
