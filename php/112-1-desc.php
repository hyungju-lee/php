<?php
    /*
     * 테이블의 구조 보기
     * 학습 내용 : 테이블의 구조를 확인하는 방법에 대해 학습합니다.
     * 힌트 내용 : DESC 명령문을 사용합니다.
     *
     * 앞에서 언급한 DESC 명령어의 데이터를 웹페이지에 출력하는 방법에 대해 학습합니다.
     * myMember 테이블의 구조를 본다면 쿼리문은 다음과 같습니다.
     *
     * DESC myMember;
     *
     * DESC 명령문을 사용해 어떠한 데이터를 출력하는지 확인하겠습니다.
     * */

    include $_SERVER['DOCUMENT_ROOT'].'/php/108-2-connectDB.php';

    $sql = "DESC myMember";
    $res = $dbConnect2->query($sql);

    $list = $res->fetch_array(MYSQLI_ASSOC);

    echo '<pre>';
    var_dump($list);
    echo '</pre>';

    /*
     * 결과를 보면 필드 myMemeberID에 대한 정보가 출력됨을 알 수 있습니다.
     * 문자열로 된 인덱스 정보 또한 알 수 있습니다.
     * fetch_array() 메소드를 반복문을 활용해 출력하여 모든 필드의 정보를 출력하겠습니다.
     * */
?>
