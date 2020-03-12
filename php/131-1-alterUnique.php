<?php

    /*
     * 특정 필드에 중복값 넣지 않기
     * 학습 내용 : 테이블의 필드에 같은 값이 입력되지 않게 하는 방법에 대해 학습합니다.
     * 힌트 내용 : UNIQUE 옵션을 사용합니다.
     *
     * 테이블의 대표 필드에 primary key 를 적용하면 해당 필드에는 같은 값이 들어가지 않습니다.
     * primary key 처럼 필드에 같은 값이 들어가지 않게 하는 기능에는 UNIQUE 가 있습니다.
     * primary key 는 단 한 번만 사용할 수 있고, 사용할 경우 필드는 해당 테이블의 기준이 되는 필드가 되지만,
     * UNIQUE는 같은 값이 들어가지 않게만 하는 기능을 갖고 있습니다.
     *
     * 예를 들어, 이메일 주소는 한 사람이 하나씩 갖고 있는 고유한 값입니다.
     * 따라서 같은 이메일 주소가 들어가지 않도록 테이블을 설계할 필요가 있습니다.
     *
     * 다음은 myMember 테이블에 UNIQUE 를 추가하여 같은 값이 들어가지 않도록 필드 옵션을 수정하는 쿼리문입니다.
     *
     * ALTER TABLE myMember MODIFY email varchar(30) NOT NULL UNIQUE COMMENT '고객의 이메일 주소';
     *
     * 옵션을 입력할 때 UNIQUE 를 추가합니다.
     * 다음은 앞의 쿼리문을 실행하는 예제입니다.
     * */

    include $_SERVER['DOCUMENT_ROOT'].'/php/108-2-connectDB.php';

    $sql = "ALTER TABLE myMember MODIFY email varchar(30) ";
    $sql .= "NOT NULL UNIQUE COMMENT '고객의 이메일 주소'";
    $result = $dbConnect2->query($sql);

    if ($result) {
        echo "변경 완료";
    } else {
        echo "변경 실패";
    }

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

?>
