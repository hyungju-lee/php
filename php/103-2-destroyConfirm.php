<?php
    /*
     * 모든 세션 삭제
     * 학습 내용 : 모든 세션을 삭제하는 방법에 대해 학습합니다.
     * 힌트 내용 : session_destroy() 함수를 사용합니다.
     *
     * 생성된 모든 세션을 삭제하려면 session_destroy() 함수를 사용합니다.
     * 특정한 세션을 삭제하는 것이 아니므로 아규먼트를 사용하지 않고 session_destroy() 함수를 호출하는 것만으로 모든 세션이 삭제됩니다.
     *
     * */

    session_start();

    echo "<pre>";
    var_dump($_SESSION);
    echo "</pre>";



?>

