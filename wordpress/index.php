<?php
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
            <a href="board/list.php">게시판</a>
            <br>
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