<?php

    /*
     * 여러 커뮤니티 사이트의 게시판 페이지를 살펴보면 처음에 20개의 게시물을 출력하고 [다음] 버튼을 누르면 그 다음 순번 20개의 게시물을 보여준다는 것을 알 수 있습니다.
     * 이를 구현하려면 LIMIT에 2개의 값을 적용해야 합니다.
     * LIMIT 에 값을 하나만 사용하면 그 값은 개수로 사용되지만,
     * 값을 2개 사용하면 첫 번째 값은 그 다음 불러올 레코드의 순번이며,
     * 이 순번은 1부터 수를 세지 않고 0부터 셉니다.
     * 두번째 값은 불러올 수를 의미합니다.
     *
     * LIMIT 에 값 2개를 적용하는 방법
     * SELECT 필드명 FROM 테이블명 LIMIT 불러올 레코드 순번, 불러올 개수
     *
     * 한 페이지당 2명의 학생을 보여주고, 그 다음 페이지에서 다음 순번의 2명의 학생을 출력하는 웹페이지를 만들 때의 쿼리문은 다음과 같이 작동합니다.
     *
     * 페이지 1 : SELECT * FROM myMember LIMIT 2;
     * 페이지 2 : SELECT * FROM myMember LIMIT 2, 2;
     * 페이지 3 : SELECT * FROM myMember LIMIT 4, 2;
     *
     * LIMIT 의 첫 번째 값에 불러올 순번을 적고, 두번째 값에 불러올 개수를 적습니다.
     * 
     * */

    include $_SERVER["DOCUMENT_ROOT"].'/php/108-2-connectDB.php';

    $sql = "SELECT * FROM myMember LIMIT 2, 3";
    $result = $dbConnect2->query($sql);

    $dataCount = $result->num_rows;

    for ($i=0; $i<$dataCount; $i++) {
        $memberInfo = $result->fetch_array(MYSQLI_ASSOC);
        echo "이름 : ".$memberInfo["name"];
        echo "<br>";
    }

    /*
     * 순번 0부터 시작하므로 2부터 시작해서 3개의 데이터를 출력합니다.
     * */
?>
