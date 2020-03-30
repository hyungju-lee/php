<?php
    date_default_timezone_set('Asia/Seoul');
    include '../../common/session.php';
    include '../../common/checkSignSession.php';
    include '../../connection/connection.php';
    $sort = $_GET['sort'];
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
    $sql = "INSERT INTO {$sort} (tableName, memberID, title, content, regTime) ";
    $sql .= "VALUES ('{$sort}', {$memberID}, '{$title}', '{$content}', {$regTime})";
    $result = $dbConnect->query($sql);
    if ($result) {
        Header("Location:list.php?sort={$sort}");
    } else {
        echo $sql;
    }
?>
