<?php
    /*
     * 폴더 존재 유무 확인하기
     * 학습 내용 : 폴더의 존재 유무를 확인하는 함수에 대해 학습합니다.
     * 힌트 내용 : is_dir() 함수를 사용합니다.
     *
     * 폴더의 존재 유무를 확인하려면 is_dir() 함수를 사용합니다.
     *
     * 다음은 is_dir() 함수를 사용하여 현재 root directory 폴더 내에 hello 폴더가 있는지
     * world 폴더가 있는지 확인하는 예제입니다.
     * hello 폴더는 앞에서 생성했으므로 존재하는 폴더이며 world 는 생성하지 않았으므로 현재는 없는 폴더입니다.
     * */

    $folderName = 'hello';
    $isDir = is_dir($folderName);
    if ($isDir) {
        echo "{$folderName} 폴더가 존재합니다.";
    } else {
        echo "{$folderName} 폴더가 존재하지 않습니다.";
    }

    echo "<br>";

    $folderName = 'world';
    $isDir = is_dir($folderName);
    if ($isDir) {
        echo "{$folderName} 폴더가 존재합니다.";
    } else {
        echo "{$folderName} 폴더가 존재하지 않습니다.";
    }
?>

