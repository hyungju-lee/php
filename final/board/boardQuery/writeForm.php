<?php
    date_default_timezone_set('Asia/Seoul');
    include '../../common/session.php';
    include '../../common/checkSignSession.php';
    $sort = $_GET['sort'];
    $sortID = $sort.'ID';
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
            echo "<form name='boardWrite' method='post' action='saveboard.php?sort={$sort}'  enctype='multipart/form-data'>";
            ?>
                <div class="form-group">
                    <label for="title">제목</label>
                    <input id="title" class="form-control" type="text" name="title" required>
                </div>
                <div class="form-group">
                    <label for="cont">내용</label>
                    <textarea id="cont" name="content" class="summernote" required></textarea>
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
include "../../include/script.php";
?>
<script>
    function cancel() {
        history.go(-1);
    }
</script>
</body>
</html>
