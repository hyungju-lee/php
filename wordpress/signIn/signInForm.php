<!DOCTYPE HTML>
<html lang="ko-KR">
<?php
    $title = '로그인';
    $root = '../';
    include "../include/head.php";
?>
<body>
<div id="wrap">
    <?php
        $root = '../';
        include "../include/header.php";
    ?>
    <div id="container">
        <div id="contents">
            <h1>로그인</h1>
            <form name="signIn" method="post" action="./signInProcessing.php">
                이메일 <br>
                <input type="email" name="userEmail" required>
                <br><br>
                비밀번호 <br>
                <input type="password" name="userPw" required>
                <br>
                <br>
                <input type="submit" value="로그인">
            </form>
        </div>
    </div>
    <?php
        include "../include/footer.php";
    ?>
</div>
</body>
</html>