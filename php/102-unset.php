<?php
    /*
     * 섹션 삭제하기
     * 학습 내용 : 세션을 삭제하는 방법에 대해 학습합니다.
     * 힌트 내용 : unset() 함수를 사용합니다.
     *
     * 세션 삭제 방법
     * unset(세션명);
     * 예) unset($_SESSION['세션명']);
     *
     * unset() 함수에 삭제하려는 세션을 아규먼트로 사용하면 해당 세션은 삭제됩니다.
     * 다음은 101번 코드에서 생성한 세션 userId를 unset() 함수를 사용하여 삭제하는 예제입니다.
     * */

    session_start();

    if (isset($_SESSION['userId'])) {
        echo "userId 세션이 존재합니다.";
        unset($_SESSION['userId']);
    } else {
        echo "userId 세션이 존재하지 않습니다.";
    }

    echo "<br>";
    echo "userId 세션의 값 : {$_SESSION['userId']}";

    /*
     * 결과를 보면 첫 번째 라인에서는 unset() 함수를 사용하기 전이므로 세션의 존재를 확인할 수 있습니다.
     * 두 번째 라인은 unset() 함수 사용 후이므로 세션값이 출력되지 않습니다.
     *
     * */
?>

