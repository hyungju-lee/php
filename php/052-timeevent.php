<?php
/*
  학습 내용 : 특정 시간을 타임스탬프 시간으로 변경하는 방법에 대해 학습합니다.
  힌트 내용 : if 문과 mktime() gkatn, time() 함수를 사용합니다.

  밤 12시 0분 0초부터 새벽 1시 59분 59초까지 페이지를 연 사람에게 어떠한 문구를 출력한다고 가정했을 때,
  밤 12시까지 회사에 대기하다 그 기능을 오픈하지 않고 시간 함수를 이용하여 12시부터 1시 59분 59초까지만 작동하도록 구현하여 일찍 퇴근할 수 있습니다.

  다음은 특정 시간에만 특정 기능이 동작하도록 하는 예제입니다.
*/

date_default_timezone_set('Asia/Seoul');

$startTime = mktime(15, 45, 0, 3, 7, 2020);
$endTime = mktime(15, 50, 0, 3, 7, 2020);
$nowTime = time();

echo "현재 시간은 " . date("Y년 m월 d일 H시 i분 s초, 올해 z일 째", time()) . "<br>";

if ($nowTime >= $startTime && $nowTime <= $endTime) {
    echo "현재 이벤트에 참여할 수 있는 시간입니다.";
} else {
    echo "이벤트 시작 전이거나 종료되었습니다.";
}
?>
