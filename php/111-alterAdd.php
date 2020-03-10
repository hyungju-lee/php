<?php
    /*
     * 테이블 필드 추가하기
     * 학습 내용 : 이미 생성한 테이블에 필드를 추가하는 방법에 대해 학습합니다.
     * 힌트 내용 : ALTER TABLE ADD 명령문을 사용합니다.
     *
     * 어떠한 테이블을 생성하고 추후에 같은 테이블에 필드를 더 추가해야 하는 경우가 간혹 발생합니다.
     * 필드에 관한 명령문은 ALTER 문입니다.
     *
     * 테이블에 필드를 추가하는 방법
     * ALTER TABLE 테이블명 ADD 추가할 필드명 옵션 코멘트 위치
     *
     * 테이블명에는 필드를 추가할 테이블명을 명시하여 필드를 추가하는 것이므로 ADD를 작성합니다.
     * 그리고 테이블 생성 시와 같이 필드의 정보를 적습니다.
     * 위치는 어떠한 필드 뒤에 위치할 것인지 의미하여 해당하는 필드명을 작성합니다.
     * 작성하지 않으면 가장 마지막에 위치합니다.
     *
     * myMember 테이블에 현재 나이 정보를 입력하는 필드를 추가하겠습니다.
     * 추가할 필드의 정보는 다음과 같습니다.
     *
     * 필드명 : currentAge
     * 데이터형 : int
     * 옵션 : unsigned
     * 코멘트 : '현재 나이'
     * 위치 : gender 필드 다음에 위치
     *
     * 앞의 정보로 currentAge 필드를 추가하는 쿼리문을 만들면 다음과 같습니다.
     *
     * ALTER TABLE myMember ADD currentAge int unsigned COMMENT '현재나이' AFTER gender
     *
     * AFTER gender는 gender 필드의 이후에 위치시킨다는 의미입니다.
     * 다음은 currentAge 필드를 myMember 테이블에 추가하는 예제입니다.
     *
     * */

    include $_SERVER["DOCUMENT_ROOT"].'/php/108-2-connectDB.php';

    $sql = "ALTER TABLE myMember ADD currentAge ";
    $sql .= "int unsigned COMMENT '현재 나이' AFTER gender";
    $res = $dbConnect2->query($sql);

    if ($res) {
        echo "필드 추가 완료";
    } else {
        echo "필드 추가 실패";
    }

    /*
     * 쿼리문이 길어서 한 줄에 작성하면 줄바뀜 현상이 발생하므로 2개로 나눠 작성합니다.
     * 5라인에는 마지막에 띄어쓰기가 들어가므로 띄어쓰기까지 작성합니다.
     *
     * 코드 111에서 사용한 쿼리문을 터미널이나 phpMyAdmin 프로그램에서 사용할 수 있으며 필드가 추가되었는지 확인할 수 있습니다.
     * 터미널에서 확인할 때는 DESC 명령문을 사용합니다.
     *
     * DESC 테이블명;
     * DESC myMember;
     * */
?>
