<?php
    date_default_timezone_set('Asia/Seoul');
    include '../../connection/connection.php';

    $sort = $_GET['sort'];
    $sortID = $sort.'ID';
    $regTime = time();
    $title = $_POST['title'];
    $content = $_POST['content'];
    $sortPK = $_GET['sortID'];


    $sql = "UPDATE {$sort} SET title = '{$title}', content = '{$content}', ";
    $sql .= "regTime = {$regTime} WHERE {$sortID} = {$sortPK}";

    $res = $dbConnect->query($sql);

    Header("Location:list.php?sort={$sort}");
?>