<?php

    /*
     * 임의로 총 4개의 레코드를 입력했습니다.
     * prodReview 테이블에는 리뷰 작성자의 이름 정보가 없습니다.
     * 리뷰 내용과 함께 리뷰 작성자 페이지에 표시하려면 JOIN 문을 사용하여
     * prodReview 테이블의 리뷰 내용과 myMember 테이블 회원명을 함께 불러옵니다.
     * JOIN 명령문은 2개 이상의 테이블을 연결해주는 기능을 합니다.
     *
     * JOIN 문 사용하기
     * SELECT 필드명 FROM 테이블명 앨리어스 JOIN 연결할 테이블명 앨리어스 ON(두 테이블의 연결고리 역할을 할 필드 조건문)
     *
     * 앨리어스라는 것은 테이블명의 별명을 짓는 것을 의미합니다.
     * myMember 테이블을 짧게 m이라고 이름지어도 되고 member 라고 이름지어도 됩니다.
     * prodReview를 r이라고 이름지어도 되고 review라고 이름지어도 됩니다.
     * 원하는 이름을 붙일 수 있습니다.
     *
     * 이렇게 앨리어스를 붙여야 하는 이유는 JOIN 문을 써야 하는 경우 필드명을 기입할 때 이 필드명이 어디에 있는 필드명인지 명시해야 하기 때문입니다.
     * 즉, myMemberID 를 출력할 경우 myMemberID 는 myMember 테이블에도 있고 prodReview 테이블에도 있기 때문에 이를 구현할 수 있어야 합니다.
     *
     * myMember 에 있는 regTime의 경우 고객의 회원가입 시간 정보가 있지만,
     * prodReview에 있는 regTime의 경우 고객이 리뷰를 입력한 시간 정보가 있기 때문에
     * 고객이 리뷰를 입력한 시간을 출력하려면 prodReview 테이블에 있는 regTime을 불러야 하므로 앨리어스가 필요합니다.
     *
     * 고객명, 리뷰 내용, 리뷰 등록 시간을 불러오는 쿼리문을 그림으로 표현하면 다음과 같습니다.
     *
     * SELECT m.name, r.content, r.regTime FROM myMember m JOIN prodReview r ON (m.myMemberID = r.myMemberID)
     *
     * ON은 2개 테이블의 공통값을 갖는 필드를 기입합니다.
     * myMember 테이블의 myMemberID와 prodReview 테이블의 myMemberID는 같은 회원번호를 의미하므로 myMemberID를 기입해야 합니다.
     * 그럼 2개의 테이블을 이용하여 회원의 이름, 회원이 남긴 리뷰, 리뷰를 남긴 시간을 출력하겠습니다.
     *
     * 다음은 JOIN 을 사용한 쿼리문입니다.
     * 이 쿼리문으로 예제를 만듭니다.
     * SELECT m.name, r.content, r.regTime FROM myMember m JOIN prodReview r ON (m.myMemberID = r.myMemberID)
     *
     * 다음은 앞의 쿼리문을 활용한 두 테이블의 데이터를 가져오는 예제입니다.
     * */

    include $_SERVER["DOCUMENT_ROOT"]."/php/108-2-connectDB.php";

    $sql = "SELECT m.name, r.content, r.regTime FROM myMember m JOIN prodReview r ";
    $sql .= "ON (m.myMemberID = r.myMemberID);";

    $res = $dbConnect2->query($sql);

    if ($res) {
        $dataCount = $res->num_rows;

        for ($i=0; $i<$dataCount; $i++) {
            $reviewInfo = $res->fetch_array(MYSQLI_ASSOC);
            echo "{$reviewInfo['regTime']} - {$reviewInfo['name']}님, {$reviewInfo['content']}";
            echo "<br>";
        }
    }

?>
