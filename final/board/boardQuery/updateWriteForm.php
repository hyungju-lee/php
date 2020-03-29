<?php
    date_default_timezone_set('Asia/Seoul');
    include '../../common/session.php';
    include '../../connection/connection.php';
    include '../../common/checkSignSession.php';
    $sort = $_POST['sort'];
    $sortPK = $_POST['sortID'];

    $sql = "SELECT title, content, memberID FROM {$sort} WHERE primaryKey = {$sortPK}";
    $result = $dbConnect->query($sql);
    if (!$result) {
        echo "오류";
    }
    $boardInfo = $result->fetch_array(MYSQLI_ASSOC);
    $boardTitle = $boardInfo['title'];
    $boardCont = htmlentities($boardInfo['content']);
    $boardMemberId = $boardInfo['memberID'];
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
            echo "<form name='boardWrite' method='post' action='update.php'>";
            ?>
                <div class="form-group">
                    <label for="title">제목</label>
            <?php
                echo "<input type='hidden' id='iptSort2' name='sort' value=''>";
                echo "<input type='hidden' id='iptSortId2' name='sortId' value=''>";
                echo "<input type='hidden' id='memberId2' name='memberId' value=''>";
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
                    <button class="btn btn-dark btn-save" type="submit" onclick="save();">저장</button>
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
    function save() {
        document.getElementById('iptSort2').value = "<?php echo $sort; ?>";
        document.getElementById('iptSortId2').value = <?php echo $sortPK; ?>;
        document.getElementById('memberId2').value = <?php echo $boardMemberId; ?>;

        document.querySelector('.btn-save').submit();
    }
    function cancel() {
        history.go(-1);
    }
</script>
</body>
</html>
