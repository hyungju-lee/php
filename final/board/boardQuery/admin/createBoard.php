<?php
    date_default_timezone_set('Asia/Seoul');
    include '../../../connection/connection.php';
    include "./table.php";

    $imgTable = "CREATE TABLE img (";
    $imgTable .= "primaryKey int(10) unsigned NOT NULL AUTO_INCREMENT,";
    $imgTable .= "memberID int(10) unsigned NOT NULL,";
    $imgTable .= "contentsType varchar(50) NOT NULL,";
    $imgTable .= "fileName varchar(50) NOT NULL,";
    $imgTable .= "filePath varchar(50) NOT NULL,";
    $imgTable .= "regTime int(10) unsigned NOT NULL,";
    $imgTable .= "saveFileName varchar(50) NOT NULL,";
    $imgTable .= "imgSize int(10) NOT NULL,";
    $imgTable .= "PRIMARY KEY (primaryKey)";
    $imgTable .= ") CHARSET = utf8;";
    $result = $dbConnect->query($imgTable);
    if ($result) {
        echo "img 생성 완료<br>";
    } else {
        echo "img 생성 실패<br>";
    }
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