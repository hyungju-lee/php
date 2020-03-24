<?php
    date_default_timezone_set('Asia/Seoul');
?>
<!DOCTYPE HTML>
<html lang="ko-KR">
<?php
    $title = '로그인';
    $root = '../';
    include "../include/head.php";
?>
<body>
<div class="wrap">
    <?php
        $root = '..';
        include "../include/header.php";
    ?>
    <div class="container center">
        <div class="login-form">
            <form name="signIn" method="post" action="./signInProcessing.php">
                <div class="form-group">
                    <label for="exampleInputEmail1">Email address</label>
                    <input id="exampleInputEmail1" class="form-control" type="email" name="userEmail" required aria-describedby="emailHelp">
                </div>
                <div class="form-group">
                    <label for="exampleInputPassword1">Password</label>
                    <input id="exampleInputPassword1" class="form-control" type="password" name="userPw" required>
                </div>
                <button type="submit" class="btn btn-dark">로그인</button>
            </form>
        </div>
    </div>
    <?php
        include "../include/footer.php";
    ?>
</div>
<?php
$root = '..';
include "../include/script.php";
?>
</body>
</html>