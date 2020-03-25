<?php
    date_default_timezone_set('Asia/Seoul');
    include '../../common/session.php';
    include '../../connection/connection.php';
    $sort = $_POST['sort'];
    $sortID = $sort.'ID';
    $memberID = $_POST['memberId'];
    $regTime = time();
    $title = $_POST['title'];
    $content = $_POST['content'];
    $sortPK = $_POST['sortId'];
    $nowID = $_SESSION['memberID'];
    if ($memberID == $nowID) {
        $sql = "UPDATE {$sort} SET title = '{$title}', content = '{$content}', ";
        $sql .= "regTime = {$regTime} WHERE {$sortID} = {$sortPK}";
        $res = $dbConnect->query($sql);
        Header("Location:list.php?sort={$sort}");
    } else {
        echo "내가 쓴 글이 아닙니다.";
    }
?>