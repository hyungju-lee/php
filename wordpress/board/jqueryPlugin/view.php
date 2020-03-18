<?php
    /*
     * 게시물 내용 보기
     * 앞에서 생성한 183-list.php 에서 게시물의 제목을 클릭하면 내용을 볼 수 있는 페이지를 생성하겠습니다.
     * URL에 GET 방식으로 함께 전달된 jqueryPluginID 의 값을 이용하여 해당 게시물의 내용을 불러오는 방식으로 구현합니다.
     *
     * 다음은 게시물의 내용을 표시하는 예제입니다.
     * */

    date_default_timezone_set('Asia/Seoul');
    include '../../common/session.php';
    include '../../common/checkSignSession.php';
    include '../../connection/connection.php';
?>

<!doctype html>
<html lang="ko">
<?php
$title = '게시판글보기';
$root = '../..';
include "../../include/head.php";
?>
<body>
<div id="wrap">
    <?php
    $root = '../..';
    include "../../include/header.php";
    ?>
    <div id="container">
        <div id="contents">
            <?php
            $memberID = $_SESSION['memberID'];

            if (isset($_GET['jqueryPluginID']) && (int) $_GET['jqueryPluginID'] > 0) {
                $jqueryPluginID = $_GET['jqueryPluginID'];
                $sql = "SELECT b.memberID, b.title, b.content, m.nickname, b.regTime FROM jqueryPlugin b ";
                $sql .= "JOIN member m ON (b.memberID = m.memberID) ";
                $sql .= "WHERE b.jqueryPluginID = {$jqueryPluginID}";
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

                        echo "<button id='edit' class='btn btn-primary' onclick='edit()' type='button'>편집</button>";
                        echo "<button id='save' class='btn btn-primary' onclick='save()' type='submit'>수정완료</button>";
                        echo "<button id='save' class='btn btn-primary' type='submit'>저장</button>";
                        echo "<button id='save' class='btn btn-primary' type='submit'>삭제</button>";


                    }

                    echo "<a href='list.php'>목록으로 이동</a>";
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
</div>
<?php
$root = '../..';
include "../../include/script.php";
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