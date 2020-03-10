<?php
    /*
     * 테이블 삭제하기
     * 학습 내용 : 테이블을 삭제하는 방법에 대해 학습합니다.
     * 힌트 내용 : DROP TABLE 명령문을 사용합니다.
     *
     * 데이터베이스 내에 있는 테이블을 삭제하는 방법에 대해 알아보겠습니다.
     *
     * DROP TABLE 테이블명
     *
     * myMember 테이블은 학습용으로 사용하므로 삭제할 테이블을 생성한 후 새로 생성한 테이블을 삭제하겠습니다.
     * 생성할 테이블의 쿼리문은 다음과 같습니다.
     *
     * CREATE TABLE test (
     *  myMemberID int(10) unsigned NOT NULL AUTO_INCREMENT,
     *  PRIMARY KEY (myMemberID)
     * );
     * */

    include $_SERVER["DOCUMENT_ROOT"].'/php/108-2-connectDB.php';

    $sql = "CREATE TABLE test(";
    $sql .= "myMemberID int(10) unsigned NOT NULL AUTO_INCREMENT,";
    $sql .= "PRIMARY KEY (myMemberID))";

    $res = $dbConnect2->query($sql);

    if ($res) {
        echo "테이블 생성 완료";
    } else {
        echo "테이블 생성 실패";
    }
?>
