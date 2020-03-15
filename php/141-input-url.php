<!DOCTYPE html>
<html>
<head>
    <title>PHP</title>
</head>
<body>
<?php
    /*
     * form 태그에서 사용하는 input 태그 - url
     * 학습 내용 : 사이트의 주소를 입력하는 폼을 생성하는 방법에 대해 학습합니다.
     * 힌트 내용 : input 태그를 사용하여 type 속성의 값으로 url 을 사용합니다.
     *
     * type 속성값이 url 이면 url 입력폼이 됩니다.
     * email 과 마찬가지로 HTML5 에서 새로 생긴 기능이며, 해당 폼에는 url 주소의 규칙을 지킨 값만이 전송될 수 있습니다.
     * 입력한 값이 url 주소 유효성에 어긋나면 submit 버튼을 눌러도 값이 전송되지 않습니다.
     * 입력을 하지 않으면 전송 버튼을 눌러도 값을 검사하지 않습니다.
     *
     * <input type="url" name="url">
     *
     *
     * */
?>

<form name="" method="" action="">
    <input type="url" name="userWebSite" placeholder="운영중인 사이트 입력">
    <input type="submit" value="전송">
</form>
</body>
</html>