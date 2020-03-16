<?php
    /*
     * 게시물 내용 보기
     * 앞에서 생성한 183-list.php 에서 게시물의 제목을 클릭하면 내용을 볼 수 있는 페이지를 생성하겠습니다.
     * URL에 GET 방식으로 함께 전달된 boardID 의 값을 이용하여 해당 게시물의 내용을 불러오는 방식으로 구현합니다.
     *
     * 다음은 게시물의 내용을 표시하는 예제입니다.
     * */

    include $_SERVER['DOCUMENT_ROOT'].'/php200project/common/171-session.php';
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/common/179-checkSignSession.php';
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/connection/163-connection.php';

    if (isset($_GET['boardID']) && (int) $_GET['boardID'] > 0) {
        $boardID = $_GET['boardID'];
        $sql = "SELECT b.title, b.content, m.nickname, b.regTime FROM board b ";
        $sql .= "JOIN member m ON (b.memberID = m.memberID) ";
        $sql .= "WHERE b.boardID = {$boardID}";
        $result = $dbConnect -> query($sql);

        if ($result) {
            $contentInfo = $result->fetch_array(MYSQLI_ASSOC);
            echo "제목 : ".$contentInfo['title']."<br>";
            echo "작성자 : ".$contentInfo['nickname']."<br>";
            $regData = date("Y-m-d h:i", $contentInfo['regTime']);
            echo "게시일 : {$regData}<br><br>";
            echo "내용 <br>";
            echo $contentInfo['content']."<br>";
            echo "<a href='/php200project/board/183-list.php'>목록으로 이동</a>";
        } else {
            echo "잘못된 접근입니다.";
            exit;
        }
    } else {
        echo "잘못된 접근입니다..";
        exit;
    }
?>

