<?php
    // 게시글의 내용을 입력하는 폼을 생성하겠습니다.
    // 게시글의 입력폼은 게시글의 제목과 내용을 입력하는 폼으로 구성됩니다.

    // 로그인하지 않은 상태에서 180-writeForm.php 페이지에 진입 시
    // 메인 페이지로 이동하는 기능이 작동하기 위해 session_start() 함수가 있는
    // 171-session.php 파일을 include 합니다.
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/common/171-session.php';
    // 로그인을 하지 않은 상태에서 메인페이지로 이동하는 기능을 하는 파일인 179-checkSignSession.php 파일을 include 합니다.
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/common/179-checkSignSession.php';
?>

<!doctype html>
<html>
<head></head>
<body>
<form name="boardWrite" method="post" action="181-saveBoard.php">
    제목
    <br><br>
    <input type="text" name="title" required>
    <br><br>
    내용
    <br><br>
    <textarea name="content" id="" cols="80" rows="10" required></textarea>
    <br><br>
    <input type="submit" value="저장">
</form>
</body>
</html>