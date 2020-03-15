<?php
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/connection/163-connection.php';

    $selectorName = $_POST['selectorName'];

    if ($selectorName == '') {
        echo "값을 입력하세요";
    } else {
        $float = $_POST['float'];
        $width = (int) $_POST['width'];
        $height = (int) $_POST['height'];
        $background = $_POST['background'];

        $marginTop = (int) $_POST['marginTop'];
        $marginRight = (int) $_POST['marginRight'];
        $marginBottom = (int) $_POST['marginBottom'];
        $marginLeft = (int) $_POST['marginLeft'];

        $sql = "UPDATE controlCSS SET floata = '{$float}',";
        $sql .= " width='{$width}', height='{$height}',";
        $sql .= " background='{$background}', marginTop='{$marginTop}',";
        $sql .= " marginRight='{$marginRight}', marginBottom='{$marginBottom}',";
        $sql .= " marginLeft='{$marginLeft}' WHERE selectorName='{$selectorName}'";
        
        $result = $dbConnect->query($sql);
        
        if ($result) {
            echo "변경 완료";
        } else {
            echo "변경 실패";
        }
    }
    
    echo "<br>";
    echo "<a href='./index.php'>CSS 디자인 페이지로 이동</a>";
    echo "<br>";
    echo "<a href='./168-controlPanel.php'>CSS 컨트롤 페이지로 이동</a>"
?>