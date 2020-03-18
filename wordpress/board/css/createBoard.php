<?php
    date_default_timezone_set('Asia/Seoul');
    include '../../connection/connection.php';

    $sql = "CREATE TABLE css (";
    $sql .= "cssID int(10) unsigned NOT NULL AUTO_INCREMENT,";
    $sql .= "memberID int(10) unsigned NOT NULL,";
    $sql .= "title varchar(50) NOT NULL,";
    $sql .= "content longtext NOT NULL,";
    $sql .= "regTime int(10) unsigned NOT NULL,";
    $sql .= "PRIMARY KEY (cssID)";
    $sql .= ") CHARSET = utf8;";
    
    $res = $dbConnect->query($sql);
    
    if ($res) {
        echo "테이블 생성 완료";
    } else {
        echo "테이블 생성 실패";
    }

?>