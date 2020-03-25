<?php
date_default_timezone_set('Asia/Seoul');
include '../common/session.php';
include '../connection/connection.php';
$email = $_POST['userEmail'];
$pw = $_POST['userPw'];
function goSignInPage($alert) {
    echo "<div class='singUp-form'>";
    echo $alert;
    echo "<div class='btn-area'>";
    echo "<a class='btn btn-dark' href='signInForm.php'>로그인 폼으로 이동</a>";
    echo "</div>";
    echo "</div>";
    return;
}
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
    include "../include/header.php";
    ?>
    <div class="container">
        <?php
        $first = false;
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            goSignInPage('올바른 이메일이 아닙니다.');
        } else {
            $first = true;
        }
        $second = false;
        if ($first == true) {
            if ($pw == null || $pw == '') {
                goSignInPage('비밀번호를 입력해 주세요.');
            } else {
                $second = true;
            }
        }
        $pw = sha1('php200'.$pw);
        if ($second == true) {
            $sql = "SELECT email, nickName, memberID FROM member ";
            $sql .= "WHERE email = '{$email}' AND pw = '{$pw}'";
            $result = $dbConnect->query($sql);
            if ($result) {
                if ($result->num_rows == 0) {
                    goSignInPage('로그인 정보가 일치하지 않습니다.');
                } else {
                    $memberInfo = $result->fetch_array(MYSQLI_ASSOC);
                    $_SESSION['memberID'] = $memberInfo['memberID'];
                    $_SESSION['nickName'] = $memberInfo['nickname'];
                    Header("Location:../index.php");
                }
            }
        }
        ?>
    </div>
    <?php
    include "../include/footer.php";
    ?>
</div>
<?php
include "../include/script.php";
?>
</body>
</html>