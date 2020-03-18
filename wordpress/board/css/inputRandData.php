<?php
    /*
     * 임의로 게시물 입력하기
     * 게시물의 목록 페이지를 만들겠습니다.
     * 그 전에 게시물 리스트로 생성하려면 많은 게시물 데이터가 필요합니다.
     * 게시물 입력폼이 있는 페이지로 여러 개의 게시물을 직접 입력하려면 불편하므로 프로그래밍을 통해 임의로 css 테이블에
     * 데이터를 입력하겠습니다.
     *
     * 다음은 css 테이블에 임의로 데이터를 입력하는 예제입니다.
     * */
    date_default_timezone_set('Asia/Seoul');
    include '../../common/session.php';
    include '../../common/checkSignSession.php';
    include '../../connection/connection.php';

    // for 문에 쓰인 변수 i 값은 memberID 필드의 값으로 변수 i의 값이 1부터 165가 될 때까지 반복합니다.
    for ($i=1; $i<165; $i++) {
        // 레코드를 입력하는 시간을 변수 time 에 대입합니다.
        $time = time();
        // css 테이블에 입력할 쿼리문입니다.
        // 제목에는 변수 i의 값을 사용하여 몇 번째 제목이라는 문구가 입력되며
        // 내용에는 변수 i의 값을 사용하여 몇 번째 내용이라는 문구가 입력됩니다.
        $sql = "INSERT INTO css (memberID, title, content, regTime)";
        $sql .= "VALUES (1, '{$i}번째 제목', '{$i}번째 내용', {$time})";
        $result = $dbConnect->query($sql);

        if ($result) {
            echo "{$i}번째 데이터 입력완료";
        } else {
            echo "{$i}번째 데이터 입력실패";
        }
    }
?>
