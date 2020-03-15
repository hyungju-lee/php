<!DOCTYPE html>
<html>
<head>
    <title>PHP</title>
</head>
<body>
<?php
    /*
     * textarea 태그의 내용을 데이터 베이스에 저장하기 - 따옴표 대응
     * 학습 내용 : textarea 태그에 입력한 따옴표에 대해 대응하는 방법에 대해 학습합니다.
     * 힌트 내용 : addslashes() 함수를 사용합니다.
     * 
     * textarea 태그를 사용하면 장문의 내용을 입력할 수 있습니다.
     * 이중 따옴표를 입력하여 데이터베이스에 저장할 때 쿼리문에서 오류가 발생하게 됩니다.
     * 그럼 어떻게 오류가 발생할 수 있는지에 대해 알아보겠습니다.
     * 우선 textarea 태그를 통해 입력폼을 생성합니다.
     * */
?>

<form name="textsave" method="post" action="./150-2-textSave.php">
    <textarea name="text" id="" cols="30" rows="10"></textarea>
    <input type="submit" value="저장">
</form>

<?php
    /*
     * 입력에 실패한 이유는 입력한 문구 hi, i'm markup developer.
     * 에 사용된 따옴표 때문입니다.
     * 문자열은 큰따옴표 또는 작은 따옴표에 쌍을 이루어 묶여야하지만 쿼리문의 문자열을 보면 그렇지 않습니다.
     *
     * 'hi, i'm markup developer.'
     *
     * 이에 대응하기 위해 addslashes() 함수를 사용합니다.
     * addslashes(문자열);
     *
     * addslashes() 를 사용하면 따옴표 앞에 역슬래시가 붙어 따옴표를 문자열의 따옴표 표시용으로 인식하게 됩니다.
     * [코드 150-2]의 4 라인을 다음과 같이 addslashes 함수를 사용하여 문자열을 대입하면 오류가 발생하지 않습니다.
     *
     * $text = addslashes($_POST['text']);
     *
     * 앞과 같이 코드를 수정 후 웹브라우저에서 150-2-textSave.php 가 실행된 페이지를 새로고침하면
     * 다음과 같이 정상적으로 데이터가 들어감을 알 수 있습니다.
     *
     * */
?>

</body>
</html>