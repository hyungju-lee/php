<?php
    /*
     * 인덱스 사용하기
     * 학습 내용 : 레코드를 검색할 때 더 빠르게 검색하는 방법에 대해 학습합니다.
     * 힌트 내용 : INDEX 옵션을 사용합니다.
     *
     * 데이터베이스의 레코드를 더욱 빠른 속도로 불러오게 하려면 인덱스를 사용해야 합니다.
     *
     * 인덱스 적용 방법
     * INDEX(필드명)
     *
     * 이미 존재하는 테이블에서 인덱스를 새로 추가하려면 ALTER 명령문을 사용합니다.
     * 다음은 이미 존재하는 myMember 테이블의 name 필드에 인덱스를 추가하는 쿼리문입니다.
     *
     * ALTER TABLE myMember ADD INDEX(name);
     *
     * */

    include $_SERVER['DOCUMENT_ROOT'].'/php/108-2-connectDB.php';

    $sql = "ALTER TABLE myMember ADD INDEX(name);";

    $result = $dbConnect2->query($sql);

    if ($result) {
        echo "적용 완료";
    } else {
        echo "적용 실패";
    }
?>
