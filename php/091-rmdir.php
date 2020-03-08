<?php
    /*
     * 폴더 삭제하기
     * 학습 내용 : 폴더를 삭제하는 함수에 대해 학습합니다.
     * 힌트 내용 : rmdir() 함수를 사용합니다.
     *
     * 생성한 디렉터리를 삭제하려면 rmdir() 함수를 사용합니다.
     *
     * rmdir('삭제할 폴더명');
     *
     * */

    rmdir('hello');

    if (is_dir('hello')) {
        echo 'hello 폴더가 존재합니다.';
    } else {
        echo 'hello 폴더가 존재하지 않습니다.';
    }
?>

