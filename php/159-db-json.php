<?php
    /*
     * 데이터베이스 자료를 json 으로 만들기
     * 학습 내용 : php 로 데이터베이스 자료를 json 데이터로 변경하는 방법에 대해 학습했습니다.
     * 힌트 내용 : 테이블에서 데이터를 불러오는 방법과 php 에서 json 데이터를 만드는 방법을 응용합니다.
     *
     * php 에서 json 데이터 생성하는 방법을 이용하여 데이터베이스의 데이터를 json 데이터로 출력하는 방법에 대해 알아보겠습니다.
     * 이 방법은 앞에서 학습한 json_encode() 함수를 사용하므로 앞에서 학습한 내용과 많이 다르지 않습니다.
     * 테이블의 데이터를 배열로 만들어 json_encode() 함수에 적용합니다.
     * 다음은 myMember 테이블의 데이터를 json 데이터로 생성하는 예제입니다.
     *
     *
     * */

    include $_SERVER['DOCUMENT_ROOT'].'/php/108-2-connectDB.php';

    $sql = "SELECT * FROM myMember";
    $result = $dbConnect2->query($sql);

    $dataCount = $result->num_rows;

    $memberList = array();

    for ($i=0; $i<$dataCount; $i++) {
        $memberInfo = $result->fetch_array(MYSQLI_ASSOC);
        array_push($memberList, $memberInfo);
    }

    echo json_encode(
        array(
            'data' => $memberList,
        )
    );

    /*
     * https://codebeautify.org/jsonviewer
     * */
?>