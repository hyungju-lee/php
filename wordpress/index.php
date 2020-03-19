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
<div id="wrap">
    <?php
        $root = '.';
        include "include/header.php";
    ?>
    <div id="container">
        <div id="contents">
        <?php
            if (!isset($_SESSION['memberID'])) {
        ?>
            <a href="signUp/signUpForm.php">회원가입</a>
            <br>
            <a href="signIn/signInForm.php">로그인</a>
        <?php
            } else {
        ?>
            <h2 class='list_h2'>Subject</h2>
        <?php

                $sql = "SHOW TABLES WHERE `Tables_In_hyungju12` NOT LIKE 'member'";
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
        <?php
                }
        ?>
            <a href="signIn/signOut.php">로그아웃</a>
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