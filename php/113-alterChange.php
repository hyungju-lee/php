<?php
    /*
     * 테이블 필드명 변경하기
     * 학습 내용 : 테이블의 필드명을 변경하는 방법에 대해 학습합니다.
     * 힌트 내용 : ALTER TABLE CHANGE 명령문을 사용합니다.
     *
     * 테이블의 필드명을 변경하는 방법에 대해 알아보겠습니다.
     *
     * ALTER TABLE 테이블명 CHANGE 기존 필드명 새 필드명 기존 데이터형
     *
     * 앞에서 생성한 currentAge 필드를 국적 정보를 담는 필드로 변경하겠습니다.
     * currentAge 필드명은 국적 정보를 담는 필드로 사용하기 위해 국적과 관련한 필드명으로 변경할 필요가 있습니다.
     *
     * currentAge 필드명을 natinality 로 변경하겠습니다.
     * 쿼리문을 만들면 다음과 같습니다.
     *
     * ALTER TABLE myMember CHANGE currentAge nationality int
     *
     *
     * */

    include $_SERVER["DOCUMENT_ROOT"].'/php/108-2-connectDB.php';

    $sql = "ALTER TABLE myMember CHANGE currentAge nationality int";
    $res = $dbConnect2->query($sql);

    if ($res) {
        echo "필드명 변경 완료";
    } else {
        echo "필드명 변경 실패";
    }
?>
