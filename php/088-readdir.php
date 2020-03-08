<?php
    /*
     * 폴더 읽기
     * 학습 내용 : 특정 폴더에 있는 폴더명이나 파일명을 불러오는 방법에 대해 학습합니다.
     * 힌트 내용 : readdir() 함수를 사용합니다.
     *
     * opendir() 함수가 반환한 데이터를 이용하여 폴더의 내용을 읽을 수 있습니다.
     * 폴더 안에 어떤 파일과 폴더가 있는지 알고자 할 때 사용합니다.
     *
     * readdir() 함수 사용 방법
     * $opendir = opendir('폴더명');
     * readdir($opendir);
     *
     * 폴더를 읽으려면 폴더를 열어야 합니다.
     * Readdir 함수의 아규먼트로 opendir() 함수가 반환한 값을 사용합니다.
     * readdir()은 폴더 내의 내용(폴더명과 파일명)을 호출할 때마다 하나씩 반환합니다.
     * 그러므로 반복문을 사용하여 폴더의 내용을 불러옵니다.
     *
     * [hello] 폴더 내에는 어떠한 폴더나 파일도 없으므로 현재 예제를 저장하고 있는 php 폴더를 대상으로하여
     * php 폴더 내의 폴더명과 파일명을 불러오겠습니다.
     *
     *
     *
     * */

    $folderName = '../php/';

    if (is_dir($folderName)) {
        echo '폴더가 존재합니다.<br>';
        $opendir = opendir($folderName);
        if ($opendir) {
            echo '폴더를 열었습니다.<br>';
            while ($readdir = readdir($opendir)) {
                echo $readdir.'<br>';
            }
        } else {
            echo '폴더를 열지 못했습니다.';
        }
    } else {
        echo '폴더가 존재하지 않습니다.';
    }
?>

