<?php
    date_default_timezone_set('Asia/Seoul');
    include '../../common/session.php';
    include '../../connection/connection.php';
    $sort = $_GET['sort'];
    $sortID = $sort.'ID';
    $beforeSearch = $_GET['beforeSearch'];
    $searchKeyword = $_GET['searchKeyword'];
?>
<!DOCTYPE HTML>
<html lang="ko">
<?php
$title = '게시판글보기';
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
                    if (isset($_SESSION['memberID'])) {
                        $memberID = $_SESSION['memberID'];
                        if ($memberID == $contentInfo['memberID']) {
                            echo "<form class='d-inline-block align-top' action='updateWriteForm.php' method='post'>";
                            echo "<input type='hidden' name='sort' value='{$sort}'>";
                            echo "<input type='hidden' name='sortID' value='{$sortPK}'>";
                            echo "<button type='submit' class='btn btn-dark'>수정</button>";
                            echo "</form>";
                            echo "<button class='btn btn-dark btn-delete d-inline-block ml-1' type='submit' onclick='delete_ly();'>삭제</button>";
                        }
                    }
                    echo "<a class='btn btn-dark d-inline-block ml-1' href='list.php?sort={$sort}&beforeSearch={$beforeSearch}&searchKeyword={$searchKeyword}'>이전페이지</a>";
                    echo "</div>";
                } else {
                    echo "잘못된 접근입니다.";
                    exit;
                }
            } else {
                echo "잘못된 접근입니다.";
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
                <button class="btn btn-dark btn-yes" type="button" onclick="yes();">확인</button>
                <button class="btn btn-dark btn-no" type="button" onclick="no();">취소</button>
            </div>
        </div>
    </div>
</div>
<?php
include "../../include/script.php";
?>
<script>
    function delete_ly() {
        document.querySelector('.modal-del').style.display = 'block';
    }
    function yes() {
        $.ajax({
            method: 'POST',
            url: 'deleteRecord.php',
            data: {
                sort: "<?php echo $sort; ?>",
                sortID: <?php echo $sortPK; ?>
            },
            success: function (data) {
                location.href = 'list.php?sort=<?php echo $sort; ?>';
            },
            error:function(request,status,error){
                alert("code:"+request.status+"\n"+"message:"+request.responseText+"\n"+"error:"+error);
            }
        })
    }
    function no() {
        document.querySelector('.modal-del').style.display = 'none';
    }
</script>
</body>
</html>