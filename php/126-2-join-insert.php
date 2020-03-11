<?php
    include $_SERVER["DOCUMENT_ROOT"]."/php/108-2-connectDB.php";

    $reviewList = array();
    $reviewList[0] = [1, '초보자에게 좋아요.'];
    $reviewList[1] = [2, '정말 초보자에게는 좋은 책이지만 깊이감은 조금 아쉽습니다.'];
    $reviewList[2] = [3, '좋습니다.'];
    $reviewList[3] = [4, '웹 개발을 처음하는 사람에게 있어 참 친절한 입문서입니다.'];

    $cnt = 0;

    foreach ($reviewList as $rl) {
        $sql = "INSERT INTO prodReview(myMemberID, content, regTime) ";
        $sql .= "VALUES({$rl[0]}, '{$rl[1]}', NOW())";

        $result = $dbConnect2->query($sql);
        $cnt++;

        if ($result) {
            echo $cnt."데이터 입력 성공"."<br>";
        } else {
            echo $cnt."데이터 입력 실패"."<br>";
        }
    }

    /*
     * 임의로 총 4개의 레코드를 입력했습니다.
     * prodReview 테이블에는 리뷰 작성자의 이름 정보가 없습니다.
     * 리뷰 내용과 함께 리뷰 작성자 페이지에 표시하려면 JOIN 문을 사용하여
     * prodReview 테이블의 리뷰 내용과 myMember 테이블 회원명을 함께 불러옵니다.
     * JOIN 명령문은 2개 이상의 테이블을 연결해주는 기능을 합니다.
     * */
?>
