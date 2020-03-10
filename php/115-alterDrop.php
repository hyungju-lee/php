<?php
    /*
     * 테이블 필드 삭제하기
     * 학습 내용 : 테이블의 필드를 삭제하는 방법에 대해 학습합니다.
     * 힌트 내용 : ALTER TABLE DROP 명령문을 사용합니다.
     *
     * 어떠한 이유로 필드가 불필요해지는 상황도 발생합니다.
     * 필드를 삭제하기 위해서는 ALTER 문에 DROP을 사용합니다.
     *
     * ALTER TABLE 테이블명 DROP 삭제할 필드명;
     *
     * 필드를 삭제하는 방법을 학습하기 위해 myMember 테이블에 있는 nationality 필드를 삭제하겠습니다.
     * nationality 필드를 삭제할 필드로 적용하면 쿼리문은 다음과 같습니다.
     *
     * ALTER TABLE myMember DROP nationality;
     *
     * */

    include $_SERVER['DOCUMENT_ROOT'].'/php/108-2-connectDB.php';

    $sql = "ALTER TABLE myMember DROP nationality";
    $res = $dbConnect2->query($sql);

    if ($res) {
        echo "필드 삭제 완료";
    } else {
        echo "필드 삭제 실패";
    }
?>
