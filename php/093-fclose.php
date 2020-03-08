<?php
    /*
     * 파일 닫기
     * 학습 내용 : 파일을 닫는 함수에 대해 학습합니다.
     * 힌트 내용 : fclose() 함수를 사용합니다.
     *
     * fopen() 함수를 사용하여 연 파일은 작업이 끝나고 파일을 닫아야 합니다.
     * fclose() 함수는 파일을 닫는 역할을 합니다.
     *
     * $fp = fopen('파일명');
     * fclose($fp);
     *
     * fclose()의 아규먼트로 fopen의 정보를 사용합니다.
     *
     * */

    $fopen = fopen('helloworld.txt','r+');
    fclose($fopen);
?>

