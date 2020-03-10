<?php

    /*
     * 테이블의 데이터 불러오기
     * 학습 내용 : 테이블의 데이터를 불러오는 방법에 대해 학습합니다.
     * 힌트 내용 : SELECT 명령문을 사용합니다.
     *
     * 앞에서 테이블에 데이터를 입력했습니다.
     * 이번에는 테이블에 있는 레코드를 불러오는 방법에 대해 알아보겠습니다.
     * 데이터를 불러오는 MySQL 명령문은 SELECT 입니다.
     *
     * SELECT 문 사용 방법
     * SELECT 필드명 FROM 테이블명;
     *
     * SELECT 를 입력한 후 불러온 필드명을 입력합니다.
     * 그런 다음 FROM 을 입력하고 테이블명을 입력합니다.
     * select는 '선택한다'는 뜻이고, from 은 '~으로부터'라는 뜻이므로 '무엇으로부터 어떤 필드를 선택한다'라고 이해하면 쉬울 것 같습니다.
     *
     * myMember 테이블의 이름과 아이디 정보를 불러온다고 가정하면 다음과 같은 쿼리문을 만들어야 합니다.
     *
     * SELECT name, userId FROM myMember;
     *
     * 모든 필드를 선택한다면 필드명 입력 부분에 * 을 입력합니다.
     *
     * SELECT * FROM myMember;
     *
     * 앞의 쿼리문만으로 phpMyAdmin 또는 터미널에서 MySQL 에 접속하여 이용하면 데이터를 불러올 수 있지만
     * PHP 와 연동하여 테이블의 데이터를 웹페이지에 출력하기 위해서는 fetch_array() 메소드를 사용해야 합니다.
     *
     * 다음은 myMember 테이블의 데이터를 가져오는 예제입니다.
     * */

    include $_SERVER['DOCUMENT_ROOT'].'/php/108-2-connectDB.php';

    $sql = "SELECT name, userId FROM myMember";
    $result = $dbConnect2->query($sql);

    $dataCount = $result->num_rows;

    for ($i = 0; $i <$dataCount; $i++) {
        $memberInfo = $result->fetch_array(MYSQLI_NUM);
        echo "이름 : ".$memberInfo[0];
        echo "<br>";
        echo "아이디 : ".$memberInfo[1];
        echo "<br>";
    }

    /*
     * 코드 118-1은 인덱스를 숫자로 지정하여 데이터를 출력했습니다.
     * 이번에는 필드명으로 하여 가져오겠습니다.
     * */

?>
