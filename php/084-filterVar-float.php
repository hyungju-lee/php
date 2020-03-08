<?php
    /*
     * filter_var() 함수로 실수 유효성 검사하기
     * 학습 내용 : 값이 실수인지 확인하는 방법에 대해 학습합니다.
     * 힌트 내용 : filter_var() 함수를 사용합니다.
     *
     * filter_var('검사할 값', FILTER_VALIDATE_FLOAT);
     *
     * */

    $float = 192.12;
    $floatCheck = filter_var($float, FILTER_VALIDATE_FLOAT);

    if ($floatCheck) {
        echo "{$float}는 실수입니다.";
    } else {
        echo "{$float}는 실수가 아닙니다.";
    }
?>

