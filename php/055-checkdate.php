<?php
    date_default_timezone_set('Asia/Seoul');

    $isDateCheck = checkdate(2, 29, 2019);

    if ($isDateCheck) {
        echo "유효한 날짜입니다.";
    } else {
        echo "유효하지 않은 날짜입니다.";
    }

?>
