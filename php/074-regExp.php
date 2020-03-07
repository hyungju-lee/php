<?php
    /*
     * 학습 내용 : 변수의 값이 한글인지를 정규표현식을 사용해 검사하는 방법에 대해 학습합니다.
     * 힌트 내용 : 한글의 문자는 '가'로 시작해 '힣'로 끝납니다.
     *
     * 값이 모두 한글로 구성되어 있는지 확인하는 방법에 대해 알아보겠습니다.
     * 한글은 '가'로 시작하여 '힣'으로 끝납니다.
     * '가'부터 '힣'까지를 표기하려면 기호 '-'를 사용합니다.
     * 간격을 지정하려면 '['와 ']' 사이의 간격을 입력합니다.
     * 한글로만 구성되어야 하므로 첫글자도 한글, 마지막 글자도 한글이어야
     * 첫 글자를 의미하는 기호인 '^'와 마지막 글자를 의미하는 기호인 '$'를 사용하여 다음의 패턴식을 구성합니다.
     *
     * $pattern = '/^[가-힣]$/';
     *
     * 시작하는 기호 '^' 다음으로 간격 [가-힣]가 위치하므로 '가'부터 '힣'까지의 문자가 첫 글자로 위치해야 하며
     * 끝나는 기호 '$' 앞에 [가-힣]가 위치해 '가'부터 '힣'까지의 문자로 끝나야 합니다.
     *
     * 앞의 패턴에서 몇 바이트 검사를 할지 지정해야 합니다.
     * 바이트를 지정하지 않으면 1byte를 검사합니다.
     * 정규식에서 영문과 특수문자는 한 글자당 1byte이며, 한글은 한 글자당 3byte입니다.
     *
     * 패턴 검사할 byte는 간격 뒤에 '{}'를 사용해 검사할 byte 수를 지정합니다.
     * 1글자를 검사한다면 {3}을 지정하고, 3글자를 검사한다면 {9}를 지정합니다.
     * 또한 1글자 이상 검사한다면 {3,}을 지정합니다.
     * 물론 여기에서도 1byte 이상 검사하는 '+'를 사용해도 무관합니다.
     *
     * 패턴 검사할 byte 지정하는 방법
     * 한글 1글자 검사하기 : $pattern = '/^[가-힣]{3}$/';
     * 한글 3글자 검사하기 : $pattern = '/^[가-힣]{9}$/';
     * 한글 3글자에서 5글자까지 검사하기 : $pattern = '/^[가-힣]{9, 15}$/';
     * 한글 3글자 이상 검사하기 : $pattern = '/^[가-힣]{9,}$/'
     * */
    
    $pattern = '/^[가-힣]{3,}$/';
    $str = "웹코딩시작하기";
    
    if(preg_match($pattern, $str, $matches)){
        echo "값 {$str}은(는) 정규식 표현에 적합한 값입니다.";
        echo "<pre>";
        var_dump($matches);
        echo "</pre>";
    } else {
        echo "이름에 특수문자, 영문 또는 숫자가 있는지 확인 요망";
    }
?>
