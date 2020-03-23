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
                    $regData = date("Y-m-d h:i", $contentInfo['regTime']);

                    echo "<h2 class='board_subject'>{$sort} 게시판</h2>";
                    echo "<h3 class='board_tit'>".$contentInfo['title']."</h3>";
                    echo "<div class='board_info'><span class='align-middle'>".$contentInfo['nickname']."</span><span class='stick'></span><span class='align-middle'>".$regData."</span></div>";
                    echo "<div class='board_cont click2edit'>".$contentInfo['content']."</div>";

                    echo "<div class='btn-area text-right mt-4'>";
                    if ($memberID == $contentInfo['memberID']) {
                        echo "<form class='del-form' action='' method='post'>";
                        echo "<input type='hidden' name='sortID' value='{$sortPK}'>";
                        echo "<input type='hidden' name='sort' value='{$sort}'>";
                        echo "</form>";
                        echo "<a href='updateWriteForm.php?sort={$sort}&sortID={$sortPK}' class='btn btn-update btn-dark d-inline-block'>수정</a>";
                        echo "<button class='btn btn-dark btn-delete d-inline-block ml-1' type='submit' onclick='delete_ly()'>삭제</button>";
                    }

                    echo "<a class='btn btn-dark d-inline-block ml-1' href='list.php?sort={$sort}'>목록으로 이동</a>";
                    echo "</div>";
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
    <div class="modal-del">
        <div class="modal-cont">
            <h3 class="h3">게시글을 삭제하시겠습니까?</h3>
            <div class="btn-area mt-4">
                <button class="btn btn-dark btn-yes" type="button" onclick="yes('deleteRecord.php');">확인</button>
                <button class="btn btn-dark btn-no" type="button" onclick="no();">취소</button>
            </div>
        </div>
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
        document.querySelector('.modal-del').style.display = 'block';
    }

    function yes(url) {
        document.querySelector('.del-form').action = url;
        document.querySelector('.del-form').submit();
    }

    function no() {
        document.querySelector('.modal-del').style.display = 'none';
    }
</script>
</body>
</html>