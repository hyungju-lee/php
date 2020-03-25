<?php
    date_default_timezone_set('Asia/Seoul');
    include '../../../connection/connection.php';
    include "./table.php";
    foreach ($tableArray as $ta) {
        $sql = "DROP TABLE {$ta}";
        $res = $dbConnect->query($sql);
        if ($res) {
            echo "{$ta} 테이블 삭제 완료 <br>";
        } else {
            echo "{$ta} 테이블 삭제 실패 <br>";
        }
    }
?>