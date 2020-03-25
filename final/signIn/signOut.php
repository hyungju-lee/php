<?php
    date_default_timezone_set('Asia/Seoul');
    include '../common/session.php';
    unset($_SESSION['memberID']);
    unset($_SESSION['nickName']);
    Header("Location:../index.php");
?>