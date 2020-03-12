<?php

    /*
     * 기존 옵션에 UNIQUE 를 추가했습니다.
     * 이 쿼리문을 실행하면 이제 email 필드에는 같은 값을 추가할 수 없습니다.
     * 이를 확인하기 위해 이미 존재하는 이메일 주소를 임의로 넣겠습니다.
     *
     * 실행하는 쿼리문은 다음과 같습니다.
     *
     * INSERT INTO myMember(userId, name, password, phone, email, birthDay, gender, regTime) VALUES('pepper', '페퍼', 'vpvjeptm', '010-1234-5678', 'everdevel@everdevel.com', '2015-11-18', 'm', now());
     * 
     * */

    include $_SERVER['DOCUMENT_ROOT'].'/php/108-2-connectDB.php';

    $sql = "INSERT INTO myMember(userId, name, password, ";
    $sql .= "phone, email, birthDay, gender, regTime) ";
    $sql .= "VALUES('pepper', '페퍼', 'vpvjeptm', '010-1234-5678',";
    $sql .= "'miu@everdevel.com', '2015-11-18', 'm', NOW());";

    $result = $dbConnect2->query($sql);

    if ($result) {
        echo "입력 완료";
    } else {
        echo "입력 실패";
    }

    /*
     * 이미 존재하는 이메일 주소인 miu@everdevel.com 을 입력하는 쿼리문입니다.
     * 현재 email 필드에는 옵션으로 UNIQUE 가 설정되어 있으므로 같은 값이 들어갈 수 없는 상태입니다.
     *
     * 결과문 보면 이미 존재하는 이메일 주소를 UNIQUE 가 설정된 email 필드에 입력하려 했으므로 입력에 실패하게 됩니다.
     * */
?>
