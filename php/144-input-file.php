<!DOCTYPE html>
<html>
<head>
    <title>PHP</title>
</head>
<body>
<?php
    /*
     * form 태그에서 사용하는 input 태그 - file
     * 학습 내용 : 서버에 파일을 전송하는 폼을 생성하는 방법에 대해 학습합니다.
     * 힌트 내용 : input 태그를 사용하여 type 속성의 값으로 file 을 사용합니다.
     *
     * 웹 서비스를 이용하다보면 자신이 찍은 사진이나, 문서 파일을 업로드한 경험이 있을 것입니다.
     * 파일을 업로드하는 폼을 만들려면 input 태그의 type 속성의 값으로 file을 사용합니다.
     *
     * type 속성값에 file 을 적용하는 방법
     * <input type="file" name="attachFile">
     *
     * 파일 업로드 폼을 만들 때는 form 태그에 enctype 속성을 적용하고 값으로 multipart/form-data 을 사용합니다.
     * 작성하지 않으면 업로드한 파일의 이름(꼉로 포함)만 업로드되고 실제 파일은 업로드가 되지 않습니다.
     *
     * */
?>

<form name="" method="" action="" enctype="multipart/form-data">
    파일 : <input type="file" name="attachFile">
</form>
</body>
</html>