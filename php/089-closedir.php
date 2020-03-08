<?php
    /*
     * 폴더 닫기
     * 학습 내용 : 폴더를 닫는 함수에 대해 학습합니다.
     * 힌트 내용 : closedir() 함수를 사용합니다.
     *
     * 폴더의 활용이 끝나면 opendir() 함수가 반환한 데이터를 닫아줍니다.
     * 이 데이터를 다을 때 closedir() 함수를 사용합니다.
     *
     * $opendir = opendir('hello');
     * closedir($opendir);
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
            closedir($opendir);
        } else {
            echo '폴더를 열지 못했습니다.';
        }
    } else {
        echo '폴더가 존재하지 않습니다.';
    }
?>

