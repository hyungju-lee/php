<!DOCTYPE html>
<html>
<head>
    <title>PHP</title>
</head>
<body>
<?php
    /*
     * post 방식 데이터 받기
     * 학습 내용 : post 방식으로 전달된 데이터를 사용하는 방법에 대해 학습합니다.
     * 힌트 내용 : php 에서 배열 $_POST 을 사용합니다.
     *
     * post 방식으로 데이터를 받는 것은 get 방식으로 데이터를 받는 것과 크게 다르지 않습니다.
     * $_GET 배열 대신 $_POST 배열을 사용합니다.
     * post 방식은 http 의 리퀘스트 내의 head 와 body 로 구분이 되는 곳의 body 영역에 데이터를 실어서 보내는 방식이며
     * get 과 달리 값이 보이지 않으므로 get 방식보다 보안 측면에서 더 좋습니다.
     *
     * post 방식의 데이터를 받으려면 다음과 같이 사용합니다.
     * $_POST[name 속성값];
     *
     *
     * */
?>

<?php
    echo "age의 값 : ".$_POST['age'];
    echo '<br>';
    echo "hobby의 값 : ".$_POST['hobby'];
?>
</body>
</html>