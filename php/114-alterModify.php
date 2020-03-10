<?php
    /*
     * 테이블 필드 옵션 변경하기
     * 학습 내용 : 테이블의 필드 옵션을 변경하는 방법에 대해 학습합니다.
     * 힌트 내용 : ALTER TABLE MODIFY 명령문을 사용합니다.
     *
     * 앞에서 currentAge 필드의 이름을 nationality 로 변경했습니다.
     * 필드명만 변경되었을뿐 여전히 숫자형 데이터가 입력되도록 되어있습니다.
     * 이 옵션을 변경하여 숫자가 아닌 문자열이 입력되도록 변경하겠습니다.
     *
     * 다음은 nationality 필드가 변경될 필드의 정보입니다.
     * 필드명 : nationality
     * 데이터형 : varchar(15)
     * 옵션 : 없음
     * 코멘트 : '국적'
     * 위치 : gender 필드 다음에 위치
     *
     * 필드의 옵션을 변경하려면 ALTER 문에 MODIFY 를 사용합니다.
     * 
     * 필드 옵션 변경 방법
     * ALTER TABLE 테이블명 MODIFY 필드명 변경할필드정보
     * 
     * nationality 필드의 정보대로 변경한다면 쿼리문은 다음과 같습니다.
     * ALTER TABLE myMember MODIFY nationality varchar(15) comment '국적' AFTER gender
     *
     * */

    include $_SERVER["DOCUMENT_ROOT"].'/php/108-2-connectDB.php';

    $sql = "ALTER TABLE myMember MODIFY nationality ";
    $sql .= "varchar(15) comment '국적' AFTER gender";
    $res = $dbConnect2 -> query($sql);

    if ($res) {
        echo "필드 정보 변경 완료";
    } else {
        echo "필드 정보 변경 실패";
    }
?>
