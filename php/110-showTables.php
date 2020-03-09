<?php
    include $_SERVER["DOCUMENT_ROOT"].'/php/108-2-connectDB.php';

    $sql = "SHOW TABLES";
    $res = $dbConnect2->query($sql);

    if ($res) {
        $list = $res->fetch_array(MYSQLI_BOTH);
        echo "테이블 목록<br>";
        for ($i=0; $i<(count($list)-1); $i++) {
            echo $list[$i];
            echo "<br>";
        }
    } else {
        echo "테이블 존재 안함";
    }
?>
