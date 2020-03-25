<?php
date_default_timezone_set('Asia/Seoul');
include '../common/session.php';
include '../connection/connection.php';
$email = $_POST['userEmail'];
$nickName = $_POST['userNickName'];
$pw = $_POST['userPw'];
$birthYear = (int) $_POST['birthYear'];
$birthMonth = (int) $_POST['birthMonth'];
$birthDay = (int) $_POST['birthDay'];
function goSignUpPage($alert) {
    echo "<div class='singUp-form'>";
    echo $alert;
    echo "<div class='btn-area'>";
    echo "<a class='btn btn-dark' href='./signUpForm.php'>회원가입 폼으로 이동</a>";
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
        $nickNameRegPattern = '/^[가-힣]{1,}$/';
        $first = false;
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            goSignUpPage('올바른 이메일 폼이 아닙니다.');
        } elseif (!preg_match($nickNameRegPattern, $nickName, $matches)) {
            goSignUpPage('닉네임은 한글로만 입력해 주세요.');
        } elseif ($pw == null || $pw == '') {
            goSignUpPage('비밀번호를 입력해 주세요.');
        } else {
            $first = true;
        }
        $pw = sha1('php200'.$pw);
        $second = false;
        $birth = null;
        if ($first == true) {
            if ($birthMonth == 0) {
                goSignUpPage('생월을 정확히 입력해 주세요.');
            } elseif ($birthDay == 0) {
                goSignUpPage('생일을 정확히 입력해 주세요.');
            } else {
                $birth = $birthYear.'-'.$birthMonth.'-'.$birthDay;
                $second = true;
            }
        }
        $isEmailCheck = false;
        if ($second == true) {
            $sql = "SELECT email FROM member WHERE email = '{$email}'";
            $result = $dbConnect->query($sql);
            if ($result) {
                $count = $result->num_rows;
                if ($count == 0) {
                    $isEmailCheck = true;
                } else {
                    goSignUpPage("이미 존재하는 이메일 입니다.");
                }
            } else {
                echo "에러발생 : 관리자 문의 요망";
            }
        }
        $isNickNameCheck = false;
        if ($isEmailCheck == true) {
            $sql = "SELECT nickName FROM member WHERE nickname = '{$nickName}'";
            $result = $dbConnect->query($sql);
            if ($result) {
                $count = $result->num_rows;
                if ($count == 0) {
                    $isNickNameCheck = true;
                } else {
                    goSignUpPage('이미 존재하는 닉네임입니다.');
                }
            } else {
                echo "에러발생 : 관리자 문의 요망";
            }
        }
        if ($isEmailCheck == true && $isNickNameCheck == true) {
            $regTime = time();
            $sql = "INSERT INTO member(email, nickname, pw, birthday, regTime)";
            $sql .= "VALUES('{$email}', '{$nickName}', '{$pw}', ";
            $sql .= "'{$birth}', {$regTime})";
            $result = $dbConnect->query($sql);
            if ($result) {
                $_SESSION['memberID'] = $dbConnect->insert_id;
                $_SESSION['nickName'] = $nickName;
                Header("Location:../index.php");
            } else {
                echo '회원가입 실패 - 관리자에게 문의';
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