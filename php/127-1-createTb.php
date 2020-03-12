<?php

    /*
     * 집계함수
     * 학습 내용 : 최대값, 최소값 등을 확인하는 집계함수에 대해 학습합니다.
     * 힌트 내용 : max, min 명령문 등을 사용합니다.
     *
     * 집계함수는 레코드의 수, 값들의 합계, 평균, 최대값, 최소값을 구하는 함수입니다.
     * 집계함수를 학습하기 위해 학생들의 과목별 성적의 합계, 평균값 등을 구해보겠습니다.
     *
     * 성적 데이터가 없기 때문에 만들어야 합니다.
     * 학생들의 명단은 myMember 테이블을 사용하며,
     * 성적 데이터를 저장할 테이블을 새로 생성합니다.
     *
     * 테이블 정보
     * 테이블 이름 : schoolRecord
     *
     * 필드 :
     *  학생 번호 myMemberID 와 값이 일치하게 만듦
     *  클래스(소속 반)
     *  영어 점수
     *  수학 점수
     *  과학 점수
     *  일본어 점수
     *  코딩 점수
     *
     * schoolRecord 테이블 생성 쿼리문은 다음과 같습니다.
     *
     *
     * */

    //CREATE TABLE schoolRecord (
    //    schoolRecordID int(10) unsigned AUTO_INCREMENT COMMENT '학생 번호',
    //    myMemberID int unsigned NOT NULL COMMENT '회원번호',
    //    class tinyint unsigned COMMENT '소속 클래스(반)',
    //    english tinyint unsigned NOT NULL COMMENT '영어 점수',
    //    math tinyint unsigned NOT NULL COMMENT '수학 점수',
    //    science tinyint unsigned NOT NULL COMMENT '과학 점수',
    //    japanese tinyint unsigned NOT NULL COMMENT '일본어 점수',
    //    coding tinyint unsigned NOT NULL COMMENT '코딩 점수',
    //    PRIMARY KEY (schoolRecordID)
    //) CHARSET = utf8 COMMENT = '성적 정보';

    include $_SERVER["DOCUMENT_ROOT"]."/php/108-2-connectDB.php";

    $sql = "CREATE TABLE schoolRecord (";
    $sql .= "schoolRecordID int(10) unsigned AUTO_INCREMENT ";
    $sql .= "COMMENT '학생 번호',";
    $sql .= "myMemberID int unsigned NOT NULL COMMENT '회원번호',";
    $sql .= "class tinyint unsigned COMMENT '소속 클래스(반)',";
    $sql .= "english tinyint unsigned NOT NULL COMMENT '영어 점수',";
    $sql .= "math tinyint unsigned NOT NULL COMMENT '수학 점수',";
    $sql .= "science tinyint unsigned NOT NULL COMMENT '과학 점수',";
    $sql .= "japanese tinyint unsigned NOT NULL COMMENT '일본어 점수',";
    $sql .= "coding tinyint unsigned NOT NULL COMMENT '코딩 점수',";
    $sql .= "PRIMARY KEY (schoolRecordID)";
    $sql .= ") CHARSET = utf8 COMMENT = '성적 정보';";

    $result = $dbConnect2->query($sql);

    if ($result) {
        echo "테이블 생성 완료";
    } else {
        echo "테이블 생성 실패";
    }

    /*
     * schoolRecord 테이블을 생성했으므로, 학생들의 성적 정보를 입력해야 합니다.
     * 다음은 점수 정보를 schoolRecord 테이블에 입력하는 예제입니다.
     * */



?>
