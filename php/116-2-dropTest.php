<?php

    include $_SERVER["DOCUMENT_ROOT"].'/php/108-2-connectDB.php';

    $sql = "DROP TABLE test";

    $res = $dbConnect2->query($sql);

    if ($res) {
        echo "테이블 삭제 완료";
    } else {
        echo "테이블 삭제 실패";
    }
?>
