<?php
    /*
     * 쿠키의 적용 범위 확인하기
     * 학습 내용 : 쿠키의 적용 범위에 대해 더 자세히 학습합니다.
     * 힌트 내용 : 적용 범위 밖과 안에서 테스트합니다.
     *
     * 앞에서 쿠키의 적용 범위의 값으로 '/'를 사용했습니다.
     * 범위는 최상단을 의미했으므로 현재 working directory 폴더 전체에서 쿠키 memberID를 사용할 수 있습니다.
     *
     * 이번에는 current working directory 폴더의 php 폴더를 범위로 지정한 쿠키를 생성하고
     * workplace_git 폴더에 checkCookie.php 파일을 만들어 쿠키값을 가져오는지 확인하겠습니다.
     *
     * */

    setcookie('check3', 'only php folder3', time()+3600, '/php/php/')
?>

