<?php
    /*
     * 인덱스 사용하기
     * 학습 내용 : 레코드를 검색할 때 더 빠르게 검색하는 방법에 대해 학습합니다.
     * 힌트 내용 : INDEX 옵션을 사용합니다.
     *
     * 데이터베이스의 레코드를 더욱 빠른 속도로 불러오게 하려면 인덱스를 사용해야 합니다.
     *
     * 인덱스 적용 방법
     * INDEX(필드명)
     *
     * 이미 존재하는 테이블에서 인덱스를 새로 추가하려면 ALTER 명령문을 사용합니다.
     * 다음은 이미 존재하는 myMember 테이블의 name 필드에 인덱스를 추가하는 쿼리문입니다.
     *
     * ALTER TABLE myMember ADD INDEX(name);
     *
     * */

    include $_SERVER['DOCUMENT_ROOT'].'/php/108-2-connectDB.php';

    $sql = "ALTER TABLE myMember ADD INDEX(name);";

    $result = $dbConnect2->query($sql);

    if ($result) {
        echo "적용 완료";
    } else {
        echo "적용 실패";
    }

    /*
     * 필드 Key 를 보면 'MUL' 이 표시된 것을 알 수 있습니다.
     * PRI는 primary key 를 의미하며 MUL은 해당 필드에 여러 가지 값이 들어갈 수 있음을 의미합니다.
     * 지금은 레코드의 수가 매우 적어서 데이터를 출력하는 데 속도의 차이가 없지만
     * 대규모 서비스에서는 데이터를 불러올 때 차이가 많이 발생합니다.
     * 자주 쓰이는 필드라면 인덱스를 적용하면 속도면에서 좋습니다.
     * */
?>
