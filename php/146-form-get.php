<!DOCTYPE html>
<html>
<head>
    <title>PHP</title>
</head>
<body>
<?php
    /*
     * get 방식으로 form 태그의 데이터 전송
     * 학습 내용 : form 태그에서 입력한 내용 중 get 방식으로 서버에 보내는 방법에 대해 학습합니다.
     * 힌트 내용 : form 태그의 method 속성의 값으로 get 을 사용하며, php 에서 배열 $_GET 을 사용합니다.
     *
     * url 에 직접 값을 입력하여 데이터를 받는 파일을 생성했습니다.
     * 이번에는 form 태그를 생성하고 생성한 데이터를 파일로 전송하는 방법에 대해 학습합니다.
     *
     * form 태그의 method 속성에는 get 을 입력하고, action 속성에는 코드 145 파일명인 145-get.php 를 입력합니다.
     *
     * <form method="get" action="./145-get.php">
     *
     * </form>
     *
     * ./는 현재 위치를 의미하며 실행하는 파일과 같은 위치에 있는 145-get.php 파일을 의미합니다.
     * 데이터를 전송하므로 input 태그의 type 송석의 값을 submit 한 버튼도 필요합니다.
     * */


?>

<form action="./145-get.php" method="get">
    나이 : <input type="text" name="age"> <br>
    취미 : <input type="text" name="hobby"> <br>
    <input type="submit" value="전송">
</form>
</body>
</html>