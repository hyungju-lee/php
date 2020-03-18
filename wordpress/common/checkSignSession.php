<?php
    date_default_timezone_set('Asia/Seoul');
    // 비로그인 시 메인페이지로 이동하게하는 페이지입니다.
    // isset() 함수를 사용해 세션 $_SESSION(['memberID']) 가 없으면 메인페이지로 이동시킵니다.
    if (!isset($_SESSION['memberID'])) {
        // 회원가입 또는 로그인 필요.
        Header("Location:../wordpress/index.php");
        exit;
    }
?>
