<?php
    /*
     * 테이블에 데이터 입력하기
     * 학습 내용 : 테이블에 데이터를 입력하는 방법에 대해 학습합니다.
     * 힌트 내용 : INSERT INTO 명령문을 사용합니다.
     *
     * myMember 테이블에 직접 데이터를 입력하겠습니다.
     * 데이터를 입력하는 명령문은 INSERT 입니다.
     *
     * INSERT INTO 테이블명(입력할 필드명) VALUES(입력할 데이터);
     *
     * 입력할 필드명은 데이터를 입력할 때 저장할 정보의 필드명입니다.
     * 이름과 휴대전화번호만 입력한다고 가정하면 그 필드를 입력한 후 values()에 해당 데이터를 입력해야 합니다.
     *
     * INSERT INTO myMember (name, phone) VALUES('이름', '010-1234-5678');
     *
     * 입력할 필드와 VALUES 값의 순서는 일치해야 합니다.
     * name 필드가 있고 그 다음에 phone 필드를 명시했다면,
     * VALUES 에서 순서에 맞춰 첫 번째에 이름을 입력하고 두 번째에 휴대전화번호를 입력해야 합니다.
     *
     * 입력할 데이터 정보
     * 아이디 : everdevel
     * 이름 : 김태영
     * 패스워드 : mm2811128
     * 휴대전화번호 : 010-1234-5678
     * 이메일 : everdevel@everdevel.com
     * 생일 : 1986-04-04
     * 성별 : 남성
     *
     * 앞의 데이터를 myMember 테이블에 입력하면 쿼리문은 다음과 같이 만들어집니다.
     *
     * INSERT INTO myMember(userId, name, password, phone, email, birthDay, gender, regTime)
     * VALUES('everdevelHost', '김태영', 'mm281118', '010-1234-5678', 'evedevel@everdevel.com', '1986-04-04', 'm', now());
     *
     * 위 쿼리문에서 명시한 필드 중에 myMemberID는 없습니다.
     * 그 이유는 auto_increment가 설정되어 스스로 값을 1씩 늘려서 입력하기 때문입니다.
     * regTime은 마지막 필드에 명시되어 있으며 그 값으로 now()가 사용되었습니다.
     * now()는 MySQL에서 현재 시간을 뜻합니다.
     * */

    include $_SERVER['DOCUMENT_ROOT'].'/php/108-2-connectDB.php';

    $sql = "INSERT INTO myMember(";
    $sql .= "userId, name, password,";
    $sql .= "phone, email, birthDay, gender, regTime)";
    $sql .= "VALUES('everdevelHost', '김태영', 'mm281118',";
    $sql .= "'010-1234-5678', 'everdevel@everdevel.com',";
    $sql .= "'1986-04-04', 'm', now())";

    $res = $dbConnect2->query($sql);

    if ($res) {
        echo "데이터 입력 완료";
    } else {
        echo "데이터 입력 실패";
    }

    /*
     * 데이터가 입력됨을 알 수 있습니다.
     * 더 많은 데이터를 입력하겠습니다.
     * 다음은 다수의 데이터를 입력하는 예제입니다.
     * */
?>
