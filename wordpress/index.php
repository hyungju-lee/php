<?php
    date_default_timezone_set('Asia/Seoul');
    include './common/session.php';
    // include './common/checkSignSession.php';
    include './connection/connection.php';
?>
<!DOCTYPE HTML>
<html lang="ko-KR">
<?php
    $title = '메인페이지';
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

        <?php
            if (!isset($_SESSION['memberID'])) {
        ?>
            <div class="contents center">
                <div class="signUp_login">
                    <a class="btn" href="signUp/signUpForm.php">회원가입</a>
                    <a class="btn ml-2" href="signIn/signInForm.php">로그인</a>
                </div>
            </div>
        <?php
            } else {
        ?>
        <div class="contents">
            <div class="btn-area text-right">
                <a class="btn btn-dark d-inline-block" href="signIn/signOut.php">로그아웃</a>
            </div>
            <h2 class='list_h2 mt-4'>Study</h2>
        <?php

                $sql = "SHOW TABLES WHERE `Tables_In_hyungju12` LIKE '%study%'";
                $result = $dbConnect->query($sql);

                if ($result) {
        ?>
            <ul class="page_list">
        <?php
            while ($row = mysqli_fetch_row($result)) {
                echo "<li class='page_list_item'><a href='board/boardQuery/list.php?sort={$row[0]}' class='page_link'>{$row[0]}</a></li>";
            }
        ?>
            </ul>
            <h2 class='list_h2'>Outputs</h2>
        <?php
                }
        ?>

        </div>
        <?php
            }
        ?>

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