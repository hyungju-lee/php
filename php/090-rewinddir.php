<?php
    /*
     * readdir() 목록을 처음으로 되돌리기
     * 학습 내용 : readdir() 함수의 데이터를 처음으로 되돌리는 방법에 대해 학습합니다.
     * 힌트 내용 : rewinddir() 함수를 사용합니다.
     *
     * readdir() 함수를 사용하여 나온 데이터를 실행할 때마다 갖고 있는 데이터를 하나씩 반환합니다.
     * readdir()의 기능을 다시 사용할 수는 없습니다.
     *
     * 예를 들어 다음의 코드와 같이 사용할 수 없습니다.
     *
     * $opendir = opendir($folderName);
     *
     * while ($readdir = readdir($opendir)) {
     *  echo $readdir."<br>";
     * }
     *
     * while ($readdir = readdir($opendir)) {
     *  echo $readdir."<br>";
     * }
     *
     * 첫번째 while문은 작동을 하지만 첫번째에서 모든 데이터를 출력했으므로
     * 두번째 while문은 더 이상 출력할 데이터가 없습니다.
     * 하지만 첫번째 while문이 끝난 후 rewinddir() 함수를 사용하면 다시 처음부터 폴더의 데이터를 읽을 수 있습니다.
     * */

    $folderName = "../php/";
    $opendir = opendir($folderName);
    if ($opendir) {
        echo readdir($opendir).'<br>';
        echo readdir($opendir).'<br>';
        echo readdir($opendir).'<br>';
        echo readdir($opendir).'<br>';
        echo readdir($opendir).'<br>';
        echo readdir($opendir).'<br>';

        rewinddir($opendir);
        echo '<br>rewinddir() 함수 실행 후<br>';

        echo readdir($opendir).'<br>';
        echo readdir($opendir).'<br>';
        echo readdir($opendir).'<br>';
        echo readdir($opendir).'<br>';
        echo readdir($opendir).'<br>';
        echo readdir($opendir).'<br>';
    }
?>

