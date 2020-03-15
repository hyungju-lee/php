<?php
    // 로그인에 성공하면 세션을 생성하므로 171-session.php 파일을 include 합니다.
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/common/171-session.php';
    unset($_SESSION['memberID']);
    unset($_SESSION['nickName']);
    echo '로그아웃 되었습니다.';
    echo "<a href='/php200project/index.php'>메인으로 이동</a>";
?>