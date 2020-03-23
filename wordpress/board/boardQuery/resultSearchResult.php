<?php
    date_default_timezone_set('Asia/Seoul');

    header('Cache-Control: no cache');
    session_cache_limiter('private_no_expire');

    include '../../common/session.php';
    include '../../common/checkSignSession.php';
    include '../../connection/connection.php';

    $sort = $_GET['sort'];
    $sortID = $sort.'ID';

    // 검색폼에서 전달받은 데이터를 변수에 대입합니다.
    $beforeKeyword = $dbConnect->real_escape_string($_GET['beforeKeyword']);
    $searchKeyword = $dbConnect->real_escape_string($_POST['searchKeyword']);

    // 검색어의 공백 여부를 확인합니다.
    if ($searchKeyword == '' || $searchKeyword == null || $beforeKeyword == '' || $beforeKeyword == null) {
        echo "검색어가 없습니다.";
        exit;
    }

    // 게시물을 불러오는 쿼리문이며 WHERE 문은 포함되지 않았습니다.

    $sql = "SELECT b.{$sortID}, b.title, m.nickname, b.regTime FROM {$sort} b ";
    $sql .= "JOIN member m ON (b.memberID = m.memberID)";
    $sql .= "WHERE (title LIKE '%{$beforeKeyword}%' OR content LIKE '%{$beforeKeyword}%') AND (title LIKE '%{$searchKeyword}%' OR content LIKE '%{$searchKeyword}%')";

    $result = $dbConnect->query($sql);
    if ($result) {
        $dataCount = $result->num_rows;
    } else {
        echo "오류 발생 - 관리자 문의";
        exit;
    }
?>
<!DOCTYPE HTML>
<html lang="ko-KR">
<?php
$title = '검색결과';
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
            <div class="btn-area text-right">
                <?php
                echo "<a class='btn btn-dark' href='./list.php?sort={$sort}'>게시글 목록으로 이동</a>";
                ?>
                <a class="btn btn-dark d-inline-block" href="../../signIn/signOut.php">로그아웃</a>
            </div>
            <div class="btn-area mb-4">
            <?php
            echo "<a class='btn btn-dark align-top' href='./writeForm.php?sort={$sort}'>글작성하기</a>";
            ?>
            </div>
            <?php
            echo "<h2 class='board_subject'>{$sort} 게시판</h2>";
            ?>

                <?php
                $memberInfo = array();
                if ($dataCount > 0) {
                    echo "<ul class='page_list'>";
                    for ($i=0; $i<$dataCount; $i++) {
                        $memberInfo = $result->fetch_array(MYSQLI_ASSOC);
                        echo "<li class='page_list_item'>";
                        echo "<a class='page_link d-flex justify-content-between' href='/wordpress/board/boardQuery/view.php?boardID={$memberInfo[$sortID]}&sort={$sort}'>";
                        echo "<span><em class='em mr-4'>[title ".$memberInfo[$sortID]."]</em> "."[".$memberInfo['title']."]</span>";
                        echo "<strong><span class='mr-2'>[".$memberInfo['nickname']."]</span> [".date('Y-m-d H:i', $memberInfo['regTime'])."]</strong>";
                        echo "</a>";
                        echo "</li>";
                    }
                    echo "</ul>";
                } else {
                    echo "<p class='note'>{$searchKeyword}를 포함하는 게시글이 없습니다.</p>";
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
</body>
</html>
