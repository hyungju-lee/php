<?php
    date_default_timezone_set('Asia/Seoul');
    include '../../connection/connection.php';
    $boardID = $_POST['sortID'];
    $sort = $_POST['sort'];
    $sql = "DELETE FROM {$sort} WHERE primaryKey = {$boardID}";
    $res = $dbConnect->query($sql);
?>