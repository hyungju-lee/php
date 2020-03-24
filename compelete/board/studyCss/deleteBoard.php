<?php
    date_default_timezone_set('Asia/Seoul');
    include '../../connection/connection.php';

    $sql = "DROP TABLE studyCss";

    $res = $dbConnect->query($sql);

    if ($res) {
        echo "member 테이블 삭제 완료";
    } else {
        echo "member 테이블 삭제 실패";
    }

?>