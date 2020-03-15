<?php

    /*
     * textarea 태그의 내용을 데이터베이스에 불러오기 - 줄바꿈 대응
     * 학습 내용 : 여러 라인으로 작성된 텍스트를 한 개의 줄에 표시하지 않는 방법에 대해 학습합니다.
     * 힌트 내용 : nl2br() 함수를 사용합니다.
     *
     * 앞에서 데이터베이스에 다음과 같이 2개의 라인의 내용을 입력했습니다.
     *
     * hi,
     * i'm markup developer.
     *
     * 앞의 내용을 웹페이지에 출력하면 입력했을 때와 같이 2개의 라인으로 표시가 되어야 합니다.
     * 하지만 별다른 조치 없이 내용을 불러오면 1개의 라인에 앞의 내용이 표시됩니다.
     *
     * 다음은 앞에서 입력한 내용을 출력하는 예제입니다.
     * */

    include $_SERVER['DOCUMENT_ROOT'].'/php/108-2-connectDB.php';

    $sql = "SELECT * FROM prodReview ORDER BY prodReviewID DESC LIMIT 1";
    $res = $dbConnect2->query($sql);

    $prodReview = $res->fetch_array(MYSQLI_ASSOC);
    echo nl2br($prodReview['content']);

    /*
     * 위 그림을 보면 입력한 내용과 달리 줄바꿈 없이 한 줄에 내용이 표시됩니다.
     * 하지만 실제로는 엔터를 입력했던 곳에 \n 이라는 기호가 입력되어 있습니다.
     * \n 의 의미는 줄바꿈을 의미합니다.
     * \n 을 <br> 태그로 변경하는 nl2br() 함수를 사용하여 줄바꿈 기능을 구현할 수 있습니다.
     *
     * nl2br(문자열);
     *
     * 코드 151의 8라인 코드를 다음과 같이 수정하면 줄바꿈 기능이 추가된 문자열을 확인할 수 있습니다.
     *
     * echo nl2br($prodReview['content']);
     *
     *
     * */
?>