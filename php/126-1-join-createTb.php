<?php
    /*
     * 2개 이상의 테이블 사용하기
     * 학습 내용 : 연관있는 2개 이상의 테이블 레코드 정보를 불러오는 방법에 대해 학습합니다.
     * 힌트 내용 : JOIN 명령문을 사용합니다.
     *
     * 하나의 웹 서비스를 운영하려면 여러 테이블을 사용합니다.
     *
     * 포털사이트를 이용하기 위해 가입하는 회원 정보를 담는 테이블,
     * 가입한 카페에 대한 테이블,
     * 게시물을 담는 테이블,
     * 게시물의 댓글을 담는 테이블,
     * 구매한 상품 정보를 담는 테이블,
     * 로그인 기록을 담는 테이블,
     * 공지사항을 담는 테이블,
     * 검색어를 담는 테이블 등
     * 수많은 테이블이 존재합니다.
     *
     * 따라서 2개 이상의 테이블을 다루는 방법에 대해 알아야 합니다.
     * 현재는 데이터베이스에 myMember 테이블만 있으므로 어떠한 상품의 리뷰 정보를 담는 테이블을 생성해 보겠습니다.
     *
     * 테이블 정보
     * 테이블 이름 : prodReview
     * 필드 :
     *  리뷰의 고유번호,
     *  리뷰를 작성한 회원번호
     *  리뷰ㅠ 내용
     *  리뷰 작성 날짜
     *
     * 리뷰 정보를 담는 테이블 정보는 앞의 테이블 정보와 같이 구성합니다.
     * 그럼 이 구성으로 테이블을 생성합니다.
     * 다음은 생성할 prodReview 테이블의 생성 쿼리문입니다.
     *
     *
     * */

    //CREATE TABLE prodReview (
    //    prodReviewID int unsigned auto_increment COMMENT '리뷰의 고유번호',
    //      myMemberID int unsigned COMMENT '리뷰를 작성한 회원번호',
    //      content tinytext COMMENT '리뷰 내용',
    //      regTime datetime not null COMMENT '리뷰 작성 날짜',
    //      primary key (prodReviewID))
    //
    //      CHARSET = utf8 COMMENT = '상품 리뷰'

    /*
     * prodReview 테이블은 리뷰 정보를 담는 테이블입니다.
     * prodReviewID 필드는 리뷰의 고유번호이며,
     * myMemberID 필드는 리뷰를 작성한 회원번호입니다.
     * content 필드에는 리뷰의 내용이 저장되며,
     * regTime 필드에 리뷰 작성 시간을 받습니다.
     * */

    include $_SERVER["DOCUMENT_ROOT"]."/php/108-2-connectDB.php";

    $sql = "CREATE TABLE prodReview (";
    $sql .= "prodReviewID int unsigned auto_increment COMMENT '리뷰의 고유번호',";
    $sql .= "myMemberID int unsigned COMMENT '리뷰를 작성한 회원번호',";
    $sql .= "content tinytext COMMENT '리뷰 내용',";
    $sql .= "regTime datetime not null COMMENT '리뷰 작성 날짜',";
    $sql .= "primary key (prodReviewID))";
    $sql .= "CHARSET = utf8 COMMENT = '상품 리뷰';";

    $result = $dbConnect2->query($sql);

    if ($result) {
        echo "테이블 생성 완료";
    } else {
        echo "테이블 생성 실패";
    }



?>
