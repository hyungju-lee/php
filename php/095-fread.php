<?php
    /*
     * 파일의 내용 읽기
     * 학습 내용 : 파일의 내용을 읽는 방법에 대해 학습합니다.
     * 힌트 내용 : fread() 함수를 사용합니다.
     *
     * 파일 helloworld.txt 에 작성한 내용을 불러오는 방법에 대해 알아보겠습니다.
     * 파일의 내용을 읽으려면 fread() 함수를 사용해야 하고,
     * fread() 함수를 사용하려면 2개의 아규먼트를 입력해야 합니다.
     *
     * 첫번째 아규먼트는 fwrite() 함수를 사용할 때와 마찬가지로 fopen() 함수이며,
     * 두번째 아규먼트에는 불러올 용량(byte)을 입력합니다.
     *
     * 5를 입력하면 파일의 내용 중 5byte 만큼만 내용을 불러옵니다.
     * 보통 파일의 내용을 불러온다면 전체의 내용을 읽어오는 용도로 사용하기 때문에 파일의 용량을 입력합니다.
     *
     * $fp = fopen('파일 경로와 파일명', 'r+');
     * $fr = fread($fp, '불러올 용량');
     *
     * 파일의 용량을 확인하려면 filesize() 함수를 사용합니다.
     * filesize()는 바이트 단위의 용량을 반환합니다.
     *
     * filesize('파일 경로와 파일명');
     *
     * 파일을 읽기 전에 읽으려는 파일이 존재하는지의 여부를 확인해야 파일이 없더라도 발생할 수 있는 오류를 막을 수 있습니다.
     * 파일 존재 여부를 확인하려면 file_exists() 함수를 사용합니다.
     *
     * file_exists('파일명');
     *
     * file_exists() 함수는 파일이 존재하면 true를 반환하고, 파일이 존재하지 않으면 false를 반환합니다.
     *
     *
     * */

    $fileName = 'helloworld.txt';
    if (file_exists($fileName)) {
        $fopen = fopen($fileName, 'r');
        if ($fopen) {
            $fread = fread($fopen, filesize($fileName));
            if ($fread) {
                echo $fread;
                fclose($fopen);
            } else {
                echo "파일 읽기에 실패했습니다.";
            }
        } else {
            echo "파일 열기에 실패했습니다.";
        }
    } else {
        echo "파일이 존재하지 않습니다.";
    }
?>

