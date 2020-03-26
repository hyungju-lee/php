<?php
    date_default_timezone_set('Asia/Seoul');
    include '../../../connection/connection.php';
    include "./table.php";
    foreach ($tableArray as $ta) {
        $taID = $ta.'ID';
        $sql = "CREATE TABLE {$ta} (";
        $sql .= "primaryKey int(10) unsigned NOT NULL AUTO_INCREMENT,";
        $sql .= "tableName varchar(20) NOT NULL,";
        $sql .= "memberID int(10) unsigned NOT NULL,";
        $sql .= "title varchar(50) NOT NULL,";
        $sql .= "content longtext NOT NULL,";
        $sql .= "regTime int(10) unsigned NOT NULL,";
        $sql .= "PRIMARY KEY (primaryKey)";
        $sql .= ") CHARSET = utf8;";
        $res = $dbConnect->query($sql);
        if ($res) {
            echo "{$ta} 생성 완료 <br>";
        } else {
            echo "{$ta} 생성 실패 <br>";
        }
    }
?>