<?php
    /*
     * 폴더 열기
     * 학습 내용 : 폴더를 여는 방법에 대해 학습합니다.
     * 힌트 내용 : opendir() 함수를 사용합니다.
     *
     * 폴더에 있는 파일의 목록을 불러오려면 해당 폴더를 여는 작업이 필요합니다.
     * 폴더를 열려면 opendir() 함수를 사용합니다.
     *
     * opendir('폴더명');
     *
     *
     * */

    $folderName = 'hello';
    $opendir = opendir($folderName);
    echo "{$opendir}"."<br>";

    if ($opendir) {
        echo "{$folderName} 폴더를 열었습니다.";
    } else {
        echo "{$folderName} 폴더를 여는데 실패했습니다.";
    }

    echo "<br>";

    $folderName = "world";
    $opendir = opendir($folderName);
    if ($opendir) {
        echo "{$folderName} 폴더를 열었습니다.";
    } else {
        echo "{$folderName} 폴더를 여는데 실패했습니다.";
    }

    /*
     * opendir() 함수가 반환한 값을 echo 문을 통하여 확인하면 다음과 같이 어떤 데이터인지 알 수 없는 값이 출력됩니다.
     *
     * Resource id #3
     *
     * 이러한 값을 핸들(handle)이라고 부릅니다.
     * 핸들은 시스템에 악영향을 줄 수 있는 중요한 데이터를 사용하는 경우
     * 이를 사용자에게 표시하지 않도록 앞과 같은 값으로 표시합니다.
     * */
?>

