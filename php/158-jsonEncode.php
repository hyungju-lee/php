<?php
    /*
     * php 에서 데이터를 json 으로 만들기
     * 학습 내용 : php 에서 json 데이터를 다루는 방법에 대해 학습합니다.
     * 힌트 내용 : json 파일을 만들어 file_get_contents() 함수를 사용해 불러옵니다.
     *
     * 서버사이드에서 클라이언트 사이드로 데이터를 전송하려면
     * 서버에서 데이터를 json 으로 변경해야 합니다.
     * php 의 데이터를 json으로 변경하려면 json_encode() 함수를 사용합니다.
     * */

    echo json_encode(
        array (
            'result' => 'sucess',
            'data' => array(
                'english' => 100,
                'math' => 95,
            )
        )
    )

    /*
     * json_encode() 의 아규먼트로 사용한 배열이 json 형태로 변경됨을 알 수 있습니다.
     * */
?>