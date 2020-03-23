<?php
date_default_timezone_set('Asia/Seoul');
?>
<!DOCTYPE HTML>
<html lang="ko-KR">
<?php
$title = '회원가입폼';
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
        <div class="singUp-form">
            <form name="signUp" method="post" action="./signUpSave.php">
                <div class="form-group">
                    <label for="exampleInputEmail1">이메일</label>
                    <input id="exampleInputEmail1" class="form-control" type="email" name="userEmail" required>
                </div>
                <div class="form-group">
                    <label for="exampleNickName">닉네임</label>
                    <input id="exampleNickName" class="form-control" type="text" name="userNickName" required>
                </div>
                <div class="form-group">
                    <label for="examplepwd">비밀번호</label>
                    <input id="examplepwd" class="form-control" type="password" name="userPw" required>
                </div>
                <div class="birth d-flex flex-row form-group">
                    <div class="flex-fill">
                        <label for="birthYear">년도</label>
                        <select id="birthYear" class="form-control" name="birthYear" id="" required>
                            <?php
                            $thisYear = date('Y', time());
                            for ($i=$thisYear; $i>=1930; $i--) {
                                echo "<option value='{$i}'>{$i}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="flex-fill ml-1">
                        <label for="birthMonth">월</label>
                        <select id="birthMonth" class="form-control" name="birthMonth" id="" required>
                            <?php
                            for ($i=1; $i<=12; $i++) {
                                echo "<option value='{$i}'>{$i}</option>";
                            }
                            ?>
                        </select>
                    </div>
                    <div class="flex-fill ml-1">
                        <label for="birthDay">일</label>
                        <select id="birthDay" class="form-control" name="birthDay" id="">
                            <?php
                            for ($i=1; $i<=31; $i++) {
                                echo "<option value='{$i}'>{$i}</option>";
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <button type="submit" class="btn btn-dark">가입하기</button>
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