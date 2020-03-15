<?php
    /*
     * 앞에서 생성한 게시글 입력폼 페이지에서 입력한 정보를 board 테이블에 저장하는 기능을 생성하겠습니다.
     * 제목을 입력하는 태그와 내용을 입력하는 태그에 required 속성을 사용했습니다.
     * 서버에서도 이 값이 제대로 입력되었는지 확인 후 제대로 입력되었다면 테이블에 입력하며
     * 그렇지 않은 경우 게시글 입력폼이 있는 페이지로 이동하는 링크를 출력합니다.
     *
     * 다음은 게시글을 board 테이블에 저장하는 예제입니다.
     * */

    include $_SERVER['DOCUMENT_ROOT'].'/php200project/common/171-session.php';
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/common/179-checkSignSession.php';
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/connection/163-connection.php';

    $title = $_POST['title'];
    $content = $_POST['content'];
?>
