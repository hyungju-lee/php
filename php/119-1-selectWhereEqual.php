<?php
    /*
     * 특정 조건의 데이터 불러오기
     * 학습 내용 : 특정 데이터를 불러오는 방법에 대해 학습합니다.
     * 힌트 내용 : WHERE 명령문을 사용합니다.
     *
     * 데이터를 불러올 때 특정한 조건을 적용하여 적합한 데이터만 불러올 수 있습니다.
     * 쿼리문에 WHERE 문을 사용하여 조건을 적용합니다.
     *
     * MySQL 조건식
     * = 같다
     * !=, <> 같지않다
     * >= 크거나 같다
     * <= 작거나 같다
     * > 크다
     * < 작다
     *
     * WHERE 사용 방법
     * SELECT 필드 FROM 테이블명 WHERE 필드명 조건기호 값;
     *
     * myMember 테이블에서 고객번호가 1번인 데이터를 가져온다면 쿼리문은 다음과 같습니다.
     * SELECT * FROM myMember WHERE myMemberID = 1;
     *
     * 고객번호가 1번이 아닌 고객의 정보를 불러온다면 다음과 같습니다.
     * SELECT * FROM myMember WHERE myMemberID != 1
     * 또는
     * SELECT * FROM myMember WHERE myMemberID <> 1
     *
     *
     * */

    include $_SERVER["DOCUMENT_ROOT"]."/php/108-2-connectDB.php";

    $sql = "SELECT name, userId FROM myMember WHERE myMemberID = 2";
    $result = $dbConnect2->query($sql);

    $memberInfo = $result -> fetch_array(MYSQLI_ASSOC);
    echo "이름 : ".$memberInfo['name'];
    echo "<br>";
    echo "아이디 : ".$memberInfo['userId'];

    /*
     * 필드 myMemberID의 값이 2인 데이터의 name 필드와 userId 필드를 불러오는 쿼리문입니다.
     * fetch_array() 메소드를 사용해 데이터를 불러옵니다.
     *
     * 여러개의 데이터를 불러온다면 반복문을 사용하지만 myMemberID 는 고유의 값을 갖는 필드로
     * 값이 1개임을 알 수 있으므로 반복문을 사용하지 않고 데이터를 출력합니다.
     *
     * 이러한 방법으로 자신이 원하는 정보에 맞는 데이터를 가져올 수 있습니다.
     * WHERE 문을 사용할 때 일부 텍스트가 일치하는 조건을 찾을 수도 있습니다.
     * 이러한 조건에서는 LIKE 문을 이용합니다.
     * 이메일에 everdevel이라는 텍스트가 있고, 앞 뒤에 어떠한 텍스트가 있는 경우 텍스트의 앞뒤로 %를 붙여줍니다.
     *
     * SELECT * FROM myMember WHERE email LIKE "%everdevel%";
     *
     * 이메일에 everdevel 이라는 텍스트가 있고 그 텍스트 앞에 아무것도 없는 데이터를 찾는다면 앞에는 %를 붙이지 않고 뒤에만 붙여줍니다.
     *
     * SELECT * FROM myMember WHERE email LIKE "everdevel%";
     *
     * 이메일에 everdevel 이라는 텍스트가 있고 그 텍스트 앞에 어떠한 텍스트가 있고,
     * 뒤에는 아무것도 없는 데이터를 찾는다면 앞에만 %를 붙여줍니다.
     *
     * SELECT * FROM myMember WHERE email LIKE "%everdevel";
     *
     * */
?>
