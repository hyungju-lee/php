<?php
    date_default_timezone_set('Asia/Seoul');
    //    include '../../common/session.php';
    //    include '../../common/checkSignSession.php';
    include '../../../connection/connection.php';
    include "./table.php";
    foreach ($tableArray as $ta) {
        for ($i=1; $i<165; $i++) {
            $time = time();
            $sql = "INSERT INTO {$ta} (memberID, title, content, regTime)";
            $sql .= "VALUES (1, '{$i}번째 제목', '{$i}번째 내용', {$time})";
            $result = $dbConnect->query($sql);
            if ($result) {
                echo "{$i}번째 데이터 입력완료";
            } else {
                echo "{$i}번째 데이터 입력실패";
            }
        }
    }
?>
