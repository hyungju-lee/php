<?php
    /*
     * 파일 내용 불러오기
     * 학습 내용 : 앞에서 저장한 텍스트를 불러오는 방법에 대해 학습합니다.
     * 힌트 내용 : fread() 함수를 사용합니다.
     *
     * 앞에서 텍스트를 여러 라인에 작성하여 파일에 저장했습니다.
     * 해당 파일의 내용을 불러오면 내용이 모두 한 라인에 표시됩니다.
     * 데이터베이스에서 여러 라인의 내용을 불러올 때와 동일한 현상이며,
     * 이 또한 마찬가지로 nl2br() 함수를 사용하여 줄바꿈을 포함하여 표시할 수 있습니다.
     * */

    $filePathName = "./text.txt";
    // 파일 존재 여부 확인
    if (file_exists($filePathName)) {
        // 파일 열기
        $fp = fopen($filePathName, 'r');
        if ($fp) {
            // 파일 읽기
            $fr = fread($fp, filesize($filePathName));
            if ($fr) {
                echo nl2br($fr); // 내용 출력
                fclose($fp); // 파일 닫기
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