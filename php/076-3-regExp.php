<?php
    $pattern = '/^[a-zA-Z가-힣. ]+$/';
    $str = '안녕하세요. Hello.'; 
    if(preg_match($pattern, $str, $matches)) {
        echo "값 {$str}은(는) 정규식 표현에 적합한 값입니다. ";
        echo "<pre>";
        echo var_dump($matches);
        echo "</pre>";
    } else {
        echo "값에 영문, 한글, .(점) 그리고 띄어쓰기외의 문자가 있는지 확인 요망";
    }

    /*
     * 영문 소문자, 영문 대문자, 한글, .(점) 그리고 띄어쓰기로 구성된 값을 검사하는 패턴식입니다.
     * 검사할 문자열 '안녕하세요. Hello.'를 대입합니다.
     * 이 값에는 띄어쓰기가 있으며, 패턴식에도 띄어쓰기를 허용하고 있으므로 패턴에 적합한 문자열입니다.
     * */
?>