<?php
    // 회원가입에 성공하면 바로 세션을 생성하기 위해 171-session.php 파일을 include 합니다.
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/common/171-session.php';
    // 데이터베이스에 접속하므로 163-connection.php 파일을 include 합니다.
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/connection/163-connection.php';

    // form 태그로 받은 데이터를 변수에 대입합니다.
    // 생년월일은 정수형으로 형변환하여 숫자외에 다름값이 들어오면 값은 0으로 변경됩니다.
    $email = $_POST['userEmail'];
    $nickName = $_POST['userNickName'];
    $pw = $_POST['userPw'];
    $birthYear = (int) $_POST['birthYear'];
    $birthMonth = (int) $_POST['birthMonth'];
    $birthDay = (int) $_POST['birthDay'];

    // 전달받은 값이 적합하지 않은 값일 때 사용할 함수입니다.
    // 파라미터로 알림 문구를 받아 출력하는 기능과 회원가입 페이지로 이동하는 링크 태그를 출력합니다.
    // a 태그는 링크 태그이며 href 속성에 이동할 주소를 입력합니다.
    function goSignUpPage($alert) {
        echo $alert.'<br>';
        echo "<a href='./173-signUpForm.php'>회원가입 폼으로 이동</a>";
        return;
    }

    // 이메일 주소가 유효성에 적합한지 검사하여 적합하지 않으면 goSignUpPage() 함수를 호출하고 페이지의 작동을 중지합니다.
    // 유효성 검사
    // 이메일 검사
    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        goSignUpPage('올바른 이메일 폼이 아닙니다.');
        exit;
    }

    // 한글로 구성되어 있는지 정규식 검사
    $nickNameRegPattern = '/^[가-힣]{1,}$/';
    if (!preg_match($nickNameRegPattern, $nickName, $matches)) {
        goSignUpPage('닉네임은 한글로만 입력해 주세요.');
        exit;
    }

    // 비밀번호 검사
    if ($pw == null || $pw == '') {
        goSignUpPage('비밀번호를 입력해 주세요.');
        exit;
    }

    // 비밀번호가 공백인지 확인 후 이상이 없다면 sha1() 함수를 사용해 입력한 비밀번호를 암호화 처리합니다.
    // sha1() 함수는 문자열을 암호화하는 함수이며 입력한 비밀번호의 앞에 사용한 'php200'은
    // 임의적으로 비밀번호 에 값을 더하여 실제 입력한 값과 다르게 변경하여 sha1() 함수가 암호화 처리하게 합니다.
    $pw = sha1('php200'.$pw);

    // 생월 검사
    if ($birthMonth == 0) {
        goSignUpPage('생월을 정확히 입력해 주세요.');
        exit;
    }

    // 생일 검사
    if ($birthDay == 0) {
        goSignUpPage('생일을 정확히 입력해 주세요.');
        exit;
    }

    // 생년월일 값이 이상이 없다면 yyyy-mm-dd 형태로 값을 생성 후 변수 birth에 대입합니다.
    $birth = $birthYear.'-'.$birthMonth.'-'.$birthDay;

    // 이메일 중복 검사
    $isEmailCheck = false;

    $sql = "SELECT email FROM member WHERE email = '{$email}'";
    $result = $dbConnect->query($sql);

    if ($result) {
        $count = $result->num_rows;
        if ($count == 0) {
            $isEmailCheck = true;
        } else {
            goSignUpPage("이미 존재하는 이메일 입니다.");
            exit;
        }
    } else {
        echo "에러발생 : 관리자 문의 요망";
        exit;
    }

    // 닉네임 중복 검사
    $isNickNameCheck = false;

    $sql = "SELECT nickName FROM member WHERE nickname = '{$nickName}'";
    $result = $dbConnect->query($sql);

    if ($result) {
        $count = $result->num_rows;
        if ($count == 0) {
            $isNickNameCheck = true;
        } else {
            goSignUpPage('이미 존재하는 닉네임입니다.');
            exit;
        }
    } else {
        echo "에러발생 : 관리자 문의 요망";
        exit;
    }

    if ($isEmailCheck == true && $isNickNameCheck == true) {
        $regTime = time();
        $sql = "INSERT INTO member(email, nickname, pw, birthday, regTime)";
        $sql .= "VALUES('{$email}', '{$nickName}', '{$pw}', ";
        $sql .= "'{$birth}', {$regTime})";
        $result = $dbConnect->query($sql);

        if ($result) {
            // member 테이블에서 데이터 입력에 성공하면 $_SESSION['memberID'] 와 $_SESSION['nickName']
            // 을 생성한 후 메인 페이지로 이동합니다.
            // insert_id는 입력된 쿼리가 갖게된 primary key의 값을 의미합니다.
            // 즉, memberID 의 값이 $_SESSION['memberID'] 에 적용됩니다.
            $_SESSION['memberID'] = $dbConnect->insert_id;
            $_SESSION['nickName'] = $nickName;
            Header("Location:../index.php");
        } else {
            echo '회원가입 실패 - 관리자에게 문의';
            exit;
        }
    } else {
        goSignUpPage('이메일 또는 닉네임이 중복값입니다.');
        exit;
    }
?>