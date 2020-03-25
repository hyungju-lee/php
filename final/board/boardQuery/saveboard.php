<?php
    date_default_timezone_set('Asia/Seoul');
    include '../../common/session.php';
    include '../../common/checkSignSession.php';
    include '../../connection/connection.php';
    $sort = $_GET['sort'];
    $sortID = $sort.'ID';
    $title = $_POST['title'];
    $content = $_POST['content'];
    if ($title != null && $title != '') {
        $title = $dbConnect->real_escape_string($title);
    }
    if ($content != null && $content != '') {
        $content = $dbConnect->real_escape_string($content);
    }
    $memberID = $_SESSION['memberID'];
    $regTime = time();
    $sql = "INSERT INTO {$sort} (memberID, title, content, regTime) ";
    $sql .= "VALUES ({$memberID}, '{$title}', '{$content}', {$regTime})";
    $result = $dbConnect->query($sql);
    Header("Location:list.php?sort={$sort}");
?>
