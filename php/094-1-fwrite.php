<?php
    /*
     * 파일 쓰기
     * 학습 내용 : 파일에 내용을 쓰는 방법에 대해 학습합니다.
     * 힌트 내용 : fwrite() 함수를 사용합니다.
     *
     * 파일에 내용을 쓰는 방법에 대해 알아보겠습니다.
     * fwrite() 함수를 사용하면 파일에 내용을 작성할 수 있습니다.
     *
     * $fp = fopen('파일 경로와 파일명', 'w');
     * $fw = fwrite($fp, '파일에 쓸 내용');
     *
     * 파일에 내용을 쓰기 위한 목적이므로 파일 을 열 때 fopen() 함수의 두 번째 아규먼트로 w를 사용합니다.
     * w는 파일의 내용을 모두 지우고 처음부터 새로 쓰는 옵션이므로 기존의 내용에 덧붙여 쓰려면 a를 사용합니다.
     *
     * */

    $content = 'Hello World';

    $fileName = 'helloworld.txt';

    $fp = fopen($fileName, 'w');

    $fw = fwrite($fp, $content);

    if ($fw == false) {
        echo '파일 쓰기에 실패했습니다.';
    } else {
        echo '파일 쓰기 완료';
    }

    fclose($fp);
?>

