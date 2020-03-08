<?php
    /*
     * filter_var() 함수로 URL 유효성 검사하기
     * 학습 내용 : 정규표현식을 이용하지 않고 URL의 유효성을 검사할 수 있습니다.
     * 힌트 내용 : filter_var() 함수를 사용합니다.
     *
     * filter_var() 함수의 첫 번째 아규먼트에는 검사할 값을 입력하며,
     * 두번째 아규먼트에는 FILTER_VALIDATE_URL 을 입력합니다.
     * FILTER_VALIDATE_URL 은 상수입니다.
     * filter_var() 함수의 두 번째 파라미터의 값에 따라 검사할 유형이 달라지는 방식입니다.
     *
     * filter_var('검사할 값', FILTER_VALIDATE_URL);
     *
     * */

    function checkUrl($url){
        $urlCheck = filter_var($url, FILTER_VALIDATE_URL);

        $returnInfo = false;
        if ($urlCheck) {
            $returnInfo = true;
        }

        return $returnInfo;
    }

    $url = "http://www.tomodevel.jp";

    if (checkUrl($url)) {
        echo "{$url}은 올바른 url입니다.";
    } else {
        echo "{$url}은 잘못된 url입니다.";
    }

    /*
     * URL을 검사하는 함수입니다.
     * 파라미터로 url을 받고 url이 유효성에 적합하면 true를 반환하고 적합하지 않으면 false를 반환합니다.
     * 함수에서 받은 파라미터로 filter_var() 한수를 사용해 url의 유효성을 체크하여 반환받은 값을 변수 urlCheck에 대입합니다.
     * urlCheck() 함수가 반환할 값을 대입하는 변수 returnInfo에 false를 대입합니다.
     * urlCheck 변수의 값이 true이면 변수 returnInfo에 true를 대입합니다.
     * 변수 returnInfo를 반환합니다.
     * */
?>
