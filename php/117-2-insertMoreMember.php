<?php

    /*
     * 데이터가 입력됨을 알 수 있습니다.
     * 더 많은 데이터를 입력하겠습니다.
     * 다음은 다수의 데이터를 입력하는 예제입니다.
     * */

    include $_SERVER["DOCUMENT_ROOT"]."/php/108-2-connectDB.php";

    $sql = "INSERT INTO myMember(userId, name, password, ";
    $sql .= "phone, email, birthDay, gender, regTime) VALUES ";

    $member = array();

    $member[0] = "('miu', '김미우', 'miupw', '010-1234-5678',";
    $member[0] .= "'miu@everdevel.com', '2007-09-02', 'w', NOW())";

    $member[1] = "('yuna', '김유나', 'yunapw', '010-1234-5678',";
    $member[1] .= "'yuna@everdevel.com', '2011-12-05', 'w', NOW())";

    $member[2] = "('minhoo', '김민후', 'minhoopw', '010-1234-5678',";
    $member[2] .= "'minhoo@everdevel.com', '2012-12-05', 'm', NOW())";

    $member[3] = "('haeyun', '김해윤', 'haeyunpw', '010-1234-5678',";
    $member[3] .= "'haeyun@everdevel.com', '2013-12-05', 'w', NOW())";

    foreach ($member as $m) {
        $query = $sql.$m;
        $res = $dbConnect2 -> query($query);

        if ($res) {
            echo "데이터 입력 성공<br>";
        } else {
            echo "데이터 입력 실패<br>";
        }
    }
?>
