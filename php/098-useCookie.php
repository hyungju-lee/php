<?php
    /*
     * 쿠키의 값 확인하기
     * 학습 내용 : 쿠키의 값을 출력하는 방법에 대해 학습합니다.
     * 힌트 내용 : 배열 $_COOKIE 에 있습니다.
     *
     * 쿠키를 생성하면 배열 $_COOKIE 에 대입됩니다.
     * 배열의 인덱스로 쿠키명을 사용합니다.
     *
     * 생성한 쿠키값 보기
     * $_COOKIE[쿠키명];
     *
     * 다음은 앞에서 생성한 쿠키 memberID를 출력하는 예제입니다.
     * 결과가 나타나지 않을 경우 97번 코드를 실행 한 후 이 예제를 실행합니다.
     * */

    if (isset($_COOKIE['memberID'])) {
        echo '쿠키 memberID의 값은 '.$_COOKIE['memberID'];
    } else {
        echo "쿠키 memberID가 존재하지 않습니다.";
    }
?>

