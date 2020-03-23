<?php
    date_default_timezone_set('Asia/Seoul');
    include './common/session.php';
    // include './common/checkSignSession.php';
    include './connection/connection.php';
?>
<!DOCTYPE HTML>
<html lang="ko-KR">
<?php
    $title = "HJ's 게시판";
    $root = '.';
    include "include/head.php";
?>
<body>
<div class="wrap">
    <?php
        $root = '.';
        include "include/header.php";
    ?>
    <div class="container">
        <div class="contents">
        <?php
            if (!isset($_SESSION['memberID'])) {
        ?>
            <div class="btn-area text-right">
                <a class="btn btn-dark d-inline-block" href="signUp/signUpForm.php">회원가입</a>
                <a class="btn btn-dark d-inline-block" href="signIn/signInForm.php">로그인</a>
            </div>
        <?php
            } else {
        ?>
            <div class="btn-area text-right">
                <a class="btn btn-dark d-inline-block" href="signIn/signOut.php">로그아웃</a>
            </div>
        <?php
            }
        ?>
        <?php

        $sql = "SHOW TABLES WHERE `Tables_In_hyungju12` LIKE '%study%'";
        $result = $dbConnect->query($sql);

        if ($result) {
            ?>
            <h2 class='list_h2 mt-4'>Study</h2>
            <ul class="page_list">
                <?php
                while ($row = mysqli_fetch_row($result)) {
                    $pageTitle = str_replace('study','',$row[0]);
                    echo "<li class='page_list_item'><a href='board/boardQuery/list.php?sort={$row[0]}' class='page_link'>{$pageTitle}</a></li>";
                }
                ?>
            </ul>
            <h2 class='list_h2'>Outputs</h2>
            <?php
        }
        ?>
        </div>
    </div>
    <?php
        include "include/footer.php";
    ?>
</div>
<?php
    $root = '.';
    include "include/script.php";
?>
</body>
</html>