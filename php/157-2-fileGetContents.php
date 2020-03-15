<?php
    $data = file_get_contents('./157-1.json');
    if ($data !== false) {
        echo "데이터형 : ".gettype($data)."<br>";
        echo $data;
    } else {
        echo "실패";
    }

    /*
     * json 데이터는 현재 php 측에서 텍스트(스트링형)일 뿐입니다.
     * 즉 json 데이터의 name 변수, score 변수를 찾아서 활용할 수 없는 단계입니다.
     * 그래서 스트링형으로 인식되는 json 데이터를 배열 데이터로 인식할 수 있게 변경해야 합니다.
     *
     * 배열로 변경하기 위해서는 json_decode() 함수를 사용합니다.
     *
     * json_decode(변수, true);
     * */
?>