<?php
    date_default_timezone_set('Asia/Seoul');
    include '../../connection/connection.php';

    $boardID = $_POST['sortID'];
    $sort = $_POST['sort'];
    $sortID = $sort.'ID';
    $sql = "DELETE FROM {$sort} WHERE {$sortID} = {$boardID}";

    $res = $dbConnect->query($sql);
    Header("Location:list.php?sort={$sort}");
?>