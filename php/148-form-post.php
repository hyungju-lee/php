<!DOCTYPE html>
<html>
<head>
    <title>PHP</title>
</head>
<body>
<?php
    /*
     * post 방식으로 form 태그의 데이터 전송
     * 학습 내용 : form 태그에서 입력한 내용을 post 방식으로 서버에 보내는 방법에 대해 학습합니다.
     * 힌트 내용 : form 태그의 method 속성의 값으로 post 를 사용하며, php 에서 배열 $_POST 를 사용합니다.
     *
     * 
     * */
?>

<form action="./147-post.php" method="post">
    나이 : <input type="text" name="age"> <br>
    취미 : <input type="text" name="hobby"> <br>
    <input type="submit" value="전송">
</form>
</body>
</html>