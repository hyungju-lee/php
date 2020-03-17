<?php
    // 로그인에 성공하면 세션을 생성하므로 171-session.php 파일을 include 합니다.
    include '../common/session.php';
    include '../connection/connection.php';

    // 이메일 주소와 비밀번호를 변수에 대입합니다.
    $email = $_POST['userEmail'];
    $pw = $_POST['userPw'];

    // goSignUpPage() 함수는 이메일 주소가 유효성에 적합하지 않거나 로그인 정보가 다른 경우 알림 문구를
    // 출력하고 로그인 폼으로 이동하는 링크를 출력하는 기능을 합니다.
    function goSignInPage($alert) {
        echo $alert.'<br>';
        echo "<a href='signInForm.php'>로그인 폼으로 이동</a>";
        return;
    }

    // 유효성 검사
    // 이메일 검사
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        goSignInPage('올바른 이메일이 아닙니다.');
        exit;
    }

    // 비밀번호 검사
    if ($pw == null || $pw == '') {
        goSignInPage('비밀번호를 입력해 주세요.');
        exit;
    }

    // 회원가입할 때 암호화한 비밀번호와 같은 값이 되도록 같은 방법으로
    // 입력받은 비밀번호를 암호화합니다.
    $pw = sha1('php200'.$pw);

    // 이메일과 비밀번호 모두 일치하는 레코드를 불러오는 쿼리문입니다.
    $sql = "SELECT email, nickName, memberID FROM member ";
    $sql .= "WHERE email = '{$email}' AND pw = '{$pw}'";
    $result = $dbConnect->query($sql);

    if ($result) {
        // 불러온 데이터의 수가 0이면 일치하는 레코드가 없다는 의미이므로 로그인에 실패하게 됩니다.
        if ($result->num_rows == 0) {
            goSignInPage('로그인 정보가 일치하지 않습니다.');
            exit;
        } else {
            // 불러온 데이터의 수가 0이 아니면 일치하는 레코드가 있음을 의미하므로 세션을 생성한 후
            // 메인 페이지로 이동합니다.
            $memberInfo = $result->fetch_array(MYSQLI_ASSOC);
            $_SESSION['memberID'] = $memberInfo['memberID'];
            $_SESSION['nickName'] = $memberInfo['nickname'];
            Header("Location:../index.php");
        }
    }
?>