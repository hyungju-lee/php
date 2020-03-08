<?php
    /*
     * filter_var() 함수로 정수 유효성 검사하기
     *
     * 학습 내용 : 값이 정수인지 확인하는 방법에 대해 학습합니다.
     * 힌트 내용 : filter_var() 함수를 사용합니다.
     *
     * filter_var() 함수를 사용해 값이 정수인지 아닌지를 검사할 수 있습니다.
     *
     * filter_var('검사할 값', FILTER_VALIDATE_INT);
     *
     * filter_var() 함수의 첫 번째 아규먼트에는 검사할 값을 입력하며,
     * 두 번째 아규먼트에는 FILTER_VALIDATE_INT 을 입력합니다.
     * FILTER_VALIDATE_INT 는 상수입니다.
     *
     * */

    function checkInt($int) {
        $intCheck = filter_var($int, FILTER_VALIDATE_INT);

        if ($intCheck) {
            echo "{$int}는 정수입니다.";
        } else {
            echo "{$int}는 정수가 아닙니다.";
        }
        echo "<br>";
    }

    checkInt(694);
    checkInt(1.25);
    checkInt('hello');
?>

