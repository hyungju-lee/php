<?php
    /*
     * 학습 내용 : 시간 정보를 배열로 만들어 사용할 수 있습니다.
     * 힌트 내용 : getdate() 함수를 사용합니다.
     *
     * 현재 시간의 정보를 배열로 받으려면 getdate() 함수를 사용합니다.
     *
     * getdate() 사용방법
     * */
    date_default_timezone_set('Asia/Seoul');

    $nowTime = getdate();
    echo "현재 년도 : ".$nowTime['year']."<br>";
    echo "현재 월 : ".$nowTime['mon']."<br>";
    echo "현재 일 : ".$nowTime['mday']."<br>";
    echo "현재 시 : ".$nowTime['hours']."<br>";
    echo "현재 분 : ".$nowTime['minutes']."<br>";
    echo "현재 초 : ".$nowTime['seconds']."<br>";
    echo "현재 요일 숫자 : ".$nowTime['wday']."<br>";
    echo "현재 요일 문자 : ".$nowTime['weekday']."<br>";
    echo "현재 월 문자 : ".$nowTime['month']."<br>";
    echo "현재 시간 타임스탬프 : ".$nowTime[0]."<br>";
    echo "올해의 일차 : ".$nowTime['yday']."<br>";

?>
