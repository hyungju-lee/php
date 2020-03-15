<!DOCTYPE html>
<html>
<head>
    <title>PHP</title>
</head>
<body>
<?php
    /*
     * form 태그에서 사용하는 input 태그 - email
     * 학습 내용 : 이메일을 입력하는 폼을 생성하는 방벙에 대해 학습합니다.
     * 힌트 내용 : input 태그를 사용하여 input type 속성의 값으로 email 을 사용합니다.
     *
     * type 속성값이 email 이면 email 입력 폼이 됩니다.
     * HTML5에서 새로 생긴 기능이며, 해당 폼에는 이메일 주소의 규칙인 @(at)과 도메인이 있어야 합니다.
     * 입력한 값이 이메일 주소 유효성에 어긋나면 submit 버튼을 눌러도 값이 전송되지 않습니다.
     * 입력을 하지 않으면 전송 버튼을 눌러도 값을 검사하지 않습니다.
     * */
?>

<form name="" method="" action="">
    <input type="email" name="userEmail" placeholder="이메일 입력">
    <input type="submit" value="전송">
</form>
</body>
</html>