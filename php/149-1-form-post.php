<!DOCTYPE html>
<html>
<head>
    <title>PHP</title>
</head>
<body>
<?php
    /*
     * 입력한 데이터를 데이터베이스에 저장하기
     * 학습 내용 : form 태그에서 입력한 내용을 데이터베이스에 저장합니다.
     * 힌트 내용 : 이미 학습한 form 태그와 데이터베이스에 레코드 입력하는 내용을 응용합니다.
     *
     * 웹 서비스를 이용하면서 입력하는 개인정보, 게시글 등은 대부분 데이터베이스에 저장됩니다.
     * 앞에서 이미 form 태그에서 입력한 데이터를 서버로 전송하는 방법을 학습했고,
     * 또한 테이블에 데이터를 입력하는 방법도 학습했으므로 이 두가지를 응용하면 구현할 수 있습니다.
     *
     * 데이터베이스의 INSERT 문을 학습할 때 SQL 문에 입력할 데이터를 POST 또는 GET 으로 받은 데이터로 입력합니다.
     * 예를 들면 다음과 같습니다.
     *
     * INSERT INTO 테이블명 (field 1, field2) VALUES ($_POST['v'], $_POST['v2']);
     *
     *
     * */
?>

<form name="test" method="post" action="./149-2-insert.php">
    <input type="text" name="userId" placeholder="아이디 입력" required>
    <br>
    <input type="text" name="userName" placeholder="이름 입력" required>
    <br>
    <input type="password" name="userPw" placeholder="비밀번호 입력" required>
    <br>
    <input type="text" name="userPhone" placeholder="휴대폰번호 입력" required>
    <br>
    <input type="email" name="userEmail" placeholder="이메일 입력" required>
    <br>
    생일 : <br>
    <select name="birthYear" id="" required>
        <?php
            $thisYear = date('Y', time());
            for ($i=1960; $i<$thisYear; $i++) {
                echo "<option value='{$i}'>{$i}</option>";
            }
        ?>
    </select>년
    <select name="birthMonth" id="" required>
        <?php
            for ($i=1; $i<=12; $i++) {
                echo "<option value='{$i}'>{$i}</option>";
            }
        ?>
    </select>월
    <select name="birthDay" id="">
        <?php
            for ($i=1; $i<=31; $i++) {
                echo "<option value='{$i}'>{$i}</option>";
            }
        ?>
    </select>일
    <br>
    성별 : <br>
    남 <input type="radio" name="userGender" value="m" required>
    여 <input type="radio" name="userGender" value="w" required>
    <br>
    <input type="submit" value="입력">
</form>

</body>
</html>