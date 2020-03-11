<?php
    /*
     * 테이블 초기화하기
     * 학습 내용 : 테이블을 초기화하는 방법에 대해 학습합니다.
     * 힌트 내용 : TRUNCATE 명령문을 사용합니다.
     *
     * 테이블을 초기화하려면 TRUNCATE 문을 사용합니다.
     * 테이블의 모든 데이터가 삭제되므로 주의하여 사용해야 합니다.
     * DELETE 문을 사용하여 레코드를 삭제하는 것과 다른 점은, DELETE 문은 레코드를 지우는 기능만 하므로
     * 사용한 primary key를 다시 배정받을 수 없지만,
     * TRUNCATE 문은 테이블을 처음 만든 상태로 만듭니다.
     * 좀 더 쉽게 말하면 현재 myMember 테이블을 DELETE 문으로 레코드를 삭제하여 데이터를 새로 입력할 경우
     * myMemberID가 n부터 시작하지만, TRUNCATE 문을 사용하여 레코드를 삭제하면 myMemberID를 1부터 사용가능합니다.
     *
     * 테이블을 초기화하는 방법
     * TRUNCATE 테이블명;
     *
     * myMember 테이블을 초기화하는 쿼리문
     * TRUNCATE myMember;
     *
     *
     * */

    include $_SERVER['DOCUMENT_ROOT'].'/php/108-2-connectDB.php';

    $sql = "TRUNCATE myMember";
    $res = $dbConnect2->query($sql);

    if ($res) {
        echo "초기화 성공";
    } else {
        echo "초기화 실패";
    }
?>
