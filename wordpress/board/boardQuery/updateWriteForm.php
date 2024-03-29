<?php
    // 게시글의 내용을 입력하는 폼을 생성하겠습니다.
    // 게시글의 입력폼은 게시글의 제목과 내용을 입력하는 폼으로 구성됩니다.

    date_default_timezone_set('Asia/Seoul');
    // 로그인하지 않은 상태에서 180-writeForm.php 페이지에 진입 시
    // 메인 페이지로 이동하는 기능이 작동하기 위해 session_start() 함수가 있는
    // 171-session.php 파일을 include 합니다.
    include '../../common/session.php';
    include '../../connection/connection.php';
    // 로그인을 하지 않은 상태에서 메인페이지로 이동하는 기능을 하는 파일인 179-checkSignSession.php 파일을 include 합니다.
    include '../../common/checkSignSession.php';

    $sort = $_GET['sort'];
    $sortID = $sort.'ID';
    $sortPK = $_GET['sortID'];

    $sql = "SELECT title, content FROM {$sort} WHERE {$sortID} = {$sortPK}";
    $result = $dbConnect->query($sql);

    if (!$result) {
        echo "오류";
    }

    $boardInfo = $result->fetch_array(MYSQLI_ASSOC);
    $boardTitle = $boardInfo['title'];
    $boardCont = $boardInfo['content'];
?>

<!DOCTYPE HTML>
<html lang="ko-KR">
<?php
    $title = '게시판글작성';
    $root = '../..';
    include "../../include/head.php";
?>
<body>
<div class="wrap">
    <?php
    include "../../include/header.php";
    ?>
    <div class="container">
        <div class="contents">
            <?php
            echo "<h2 class='board_subject'>{$sort} 게시판</h2>";
            echo "<form name='boardWrite' method='post' action='update.php?sort={$sort}&sortID={$sortPK}'>";
            ?>
                <div class="form-group">
                    <label for="title">제목</label>
                    <?php
                echo "<input id='title' class='form-control' type='text' name='title' value='{$boardTitle}' required>";
            ?>
                </div>

                <div class="form-group">
                    <label for="cont">내용</label>
                    <?php
                echo "<textarea id='cont' name='content' class='summernote' required>{$boardCont}</textarea>";
            ?>
                </div>
                <div class="btn-area">
                    <button class="btn btn-dark" type="submit">저장</button>
                    <button class="btn btn-dark" type="button" onclick="cancel();">취소</button>
                </div>
            </form>
        </div>
    </div>
    <?php
    include "../../include/footer.php";
    ?>
</div>
<?php
$root = '../..';
include "../../include/script.php";
?>
<script>
    function cancel() {
        history.go(-1);
    }
</script>
</body>
</html>
