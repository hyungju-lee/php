<?php
    /*
     * 게시물 내용 보기
     * 앞에서 생성한 183-list.php 에서 게시물의 제목을 클릭하면 내용을 볼 수 있는 페이지를 생성하겠습니다.
     * URL에 GET 방식으로 함께 전달된 $sortID 의 값을 이용하여 해당 게시물의 내용을 불러오는 방식으로 구현합니다.
     *
     * 다음은 게시물의 내용을 표시하는 예제입니다.
     * */

    date_default_timezone_set('Asia/Seoul');
    include '../../common/session.php';
    include '../../common/checkSignSession.php';
    include '../../connection/connection.php';

    $sort = $_GET['sort'];
    $sortID = $sort.'ID';
?>

<!doctype html>
<html lang="ko">
<?php
$title = '게시판글보기';
$root = '../..';
include "../../include/head.php";
?>
<body>
<div class="wrap">
    <?php
    $root = '../..';
    include "../../include/header.php";
    ?>
    <div class="container">
        <div class="contents">
            <?php
            $memberID = $_SESSION['memberID'];

            if (isset($_GET['boardID']) && (int) $_GET['boardID'] > 0) {
                $boardID = $_GET['boardID'];
                $sql = "SELECT b.{$sortID}, b.memberID, b.title, b.content, m.nickname, b.regTime FROM {$sort} b ";
                $sql .= "JOIN member m ON (b.memberID = m.memberID) ";
                $sql .= "WHERE b.{$sortID} = {$boardID}";
                $result = $dbConnect -> query($sql);

                if ($result) {
                    $contentInfo = $result->fetch_array(MYSQLI_ASSOC);
                    $sortPK = $contentInfo[$sortID];

                    echo "제목 : ".$contentInfo['title']."<br>";
                    echo "작성자 : ".$contentInfo['nickname']."<br>";
                    $regData = date("Y-m-d h:i", $contentInfo['regTime']);
                    echo "게시일 : {$regData}<br><br>";
                    echo "내용 <br>";
                    echo "<div class='click2edit'>".$contentInfo['content']."</div>";

                    if ($memberID == $contentInfo['memberID']) {

                        echo "<a href='updateWriteForm.php?sort={$sort}&sortID={$sortPK}' class='btn btn-update'>수정</a>";

                        echo "<form class='del-form' action='' method='post'>";
                        echo "<input type='hidden' name='sortID' value='{$sortPK}'>";
                        echo "<input type='hidden' name='sort' value='{$sort}'>";
                        echo "</form>";

                        echo "<button class='btn btn-primary btn-delete' type='submit' onclick='delete_ly()'>삭제</button>";
                    }

                    echo "<a href='list.php?sort={$sort}'>목록으로 이동</a>";
                } else {
                    echo "잘못된 접근입니다.";
                    exit;
                }
            } else {
                echo "잘못된 접근입니다..";
                exit;
            }
            ?>
        </div>
    </div>
    <?php
    include "../../include/footer.php";
    ?>

    <div class="delete_ly" style="display: none; position: fixed; top: 50%; left: 50%; transform: translate(-50%,-50%)">
        <span>삭제하시겠습니까?</span>
        <button class="btn-yes" type="button" onclick="yes('deleteRecord.php');">넵</button>
        <button class="btn-no" type="button" onclick="no();">아뇨</button>
    </div>
</div>
<?php
$root = '../..';
include "../../include/script.php";
?>
<script>
    // var edit = function() {
    //     $('.click2edit').summernote({focus: true});
    // };
    //
    // var save = function() {
    //     var markup = $('.click2edit').summernote('code');
    //     $('.click2edit').summernote('destroy');
    // };

    function delete_ly() {
        document.querySelector('.delete_ly').style.display = 'block';
    }

    function yes(url) {
        document.querySelector('.del-form').action = url;
        document.querySelector('.del-form').submit();
    }

    function no() {
        document.querySelector('.delete_ly').style.display = 'none';
    }
</script>
</body>
</html>