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
?>

<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>게시판글보기</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.js"></script>
    <!-- include summernote-ko-KR -->
    <script src="../lang/summernote-ko-KR.js"></script>
</head>
<body>
    <?php
    $memberID = $_SESSION['memberID'];

    if (isset($_GET['boardID']) && (int) $_GET['boardID'] > 0) {
        $boardID = $_GET['boardID'];
        $sql = "SELECT b.memberID, b.title, b.content, m.nickname, b.regTime FROM board b ";
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
            echo "<div class='click2edit'>".$contentInfo['content']."</div>";

            if ($memberID == $contentInfo['memberID']) {

                echo "<button id='edit' class='btn btn-primary' onclick='edit()' type='button'>Edit</button>";
                echo "<button id='save' class='btn btn-primary' onclick='save()' type='submit'>Save</button>";

            }

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
    <script>
        var edit = function() {
            $('.click2edit').summernote({focus: true});
        };

        var save = function() {
            var markup = $('.click2edit').summernote('code');
            $('.click2edit').summernote('destroy');
        };
    </script>
</body>
</html>