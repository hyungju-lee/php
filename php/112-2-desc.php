<?php

    /*
     * 결과를 보면 필드 myMemeberID에 대한 정보가 출력됨을 알 수 있습니다.
     * 문자열로 된 인덱스 정보 또한 알 수 있습니다.
     * fetch_array() 메소드를 반복문을 활용해 출력하여 모든 필드의 정보를 출력하겠습니다.
     * */

    include $_SERVER['DOCUMENT_ROOT'].'/php/108-2-connectDB.php';

    $sql = "DESC myMember";
    $res = $dbConnect2->query($sql);

    while ($list = $res->fetch_array(MYSQLI_ASSOC)) {
        echo "Field : ".$list['Field'];
        echo "<br>";
        echo "Type : ".$list['Type'];
        echo "<br>";
        echo "Null : ".$list['Null'];
        echo "<br>";
        echo "Key : ".$list['Key'];
        echo "<br>";
        echo "Default : ".$list['Default'];
        echo "<br>";
        echo "Extra : ".$list['Extra'];

        echo "<br>";
        echo "<br>";
    }

    /*
     * 쿼리문의 결과를 변수 list에 대입하여 반복문을 사용해 값을 출력합니다.
     * 배열의 인덱스 정보는 코드 112-1 의 결과에서 확인한 인덱스를 사용하여 정보를 출력합니다.
     * */
?>
