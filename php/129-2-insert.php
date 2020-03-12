<?php
    /*
     * dropOutOld 테이블에 레코드 6개, dropOutNew 테이블에 레코드 4개를 넣습니다.
     * */

    include $_SERVER['DOCUMENT_ROOT'].'/php/108-2-connectDB.php';

    $oldList = array();
    $oldList[0] = ['김태영', 'ever@everdevel.com'];
    $oldList[1] = ['김미우', 'miu@everdevel.com'];
    $oldList[2] = ['김유나', 'yuna@everdevel.com'];
    $oldList[3] = ['김민후', 'minhoo@everdevel.com'];
    $oldList[4] = ['김해윤', 'haeyun@everdevel.com'];
    $oldList[5] = ['조주흥', 'pika@everdevel.com'];

    $newList = array();
    $newList[0] = ['조주흥', 'pika@everdevel.com'];
    $newList[1] = ['유우코', 'kobayashiyuko@everdevel.com'];
    $newList[2] = ['유리', 'hoshinayuri@everdevel.com'];
    $newList[3] = ['홍길동', 'gildong@everdevel.com'];

    $inputList = array();
    $inputList['dropOutOld'] = $oldList;
    $inputList['dropOutNew'] = $newList;

    $cnt = 0;

    foreach ($inputList as $key => $il) {
        foreach ($il as $i) {
            $sql = "INSERT INTO {$key}(name, email) VALUES('{$i[0]}', '{$i[1]}')";
            $result = $dbConnect2->query($sql);
            $cnt++;

            if ($result) {
                echo $cnt." 데이터 입력 성공";
            } else {
                echo $cnt." 데이터 입력 실패";
            }
            echo "<br>";
        }
    }

    /*
     * 두 테이블에 데이터를 입력했습니다.
     * 이제 UNION 명령문에 대해 알아보겠습니다.
     *
     * UNION 사용 방법
     * (첫 번째 테이블의 SELECT 문) UNION (두번째 테이블의 SELECT 문)
     *
     * (SELECT 필드명 FROM dropOutOld) UNION (SELECT 필드명 FROM dropOutNew);
     *
     * 서로 다른 테이블의 SELECT 문을 작성하고 그 사이에 UNION 이 위치하도록 합니다.
     * 단, SELECT 문에서 불러올 필드명을 기입할 때에는 필드의 수가 같아야 한다는 점에 주의해야 합니다.
     * 첫 번째 테이블에서 필드 3개를 선택하고,
     * 두 번째 테이블에서 필드 3개을 선택하지 않으면 문법 에러가 발생합니다.
     *
     * 다음은 UNION을 사용하여 두 테이블에 있는 데이터를 출력하는 쿼리문입니다.
     *
     * (SELECT name, email FROM dropOutOld) UNION (SELECT name, email FROM dropOutNew);
     *
     *
     * */
?>
