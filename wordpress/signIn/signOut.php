<?php
    // 로그인에 성공하면 세션을 생성하므로 171-session.php 파일을 include 합니다.
    include '../common/session.php';
    unset($_SESSION['memberID']);
    unset($_SESSION['nickName']);
    echo "<a href='/wordpress/index.php'>메인으로 이동</a>";

//    Header("Location:../index.php");
?>