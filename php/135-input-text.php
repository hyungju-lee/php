<!DOCTYPE html>
<html>
<head>
    <title>PHP</title>
</head>
<body>
<form name="" method="" action="">
    <input type="text" name="userID" maxlength="12" placeholder="아이디 입력">
</form>

<?php
    /*
     * form 태그에서 사용하는 input 태그 - text
     * 학습 내용 : 짧은 문구를 입력하는 텍스트 박스를 생성하는 방법에 대해 학습합니다.
     * 힌트 내용 : input 태그를 사용하며 type 속성 값으로 text 를 사용합니다.
     *
     * input 태그는 type 의 값에 따라 다른 기능을 제공합니다.
     * input 태그 사용 방법
     * <input type="타입" name="입력폼의 이름" maxlength="입력 가능 글자 수" />
     *
     * type 속성은 값에 따라 ID를 입력하는 입력 폼이 될 수 있고, 비밀번호 입력 폼이 될 수도 있습니다.
     * name 속성은 이 입력 폼의 이름을 뜻하며, 서버 사이드 언어(PHP)에서 이 값으로 입력된 데이터를 전달받을 수 있습니다.
     *
     * maxlength 속성은 이 입력폼이 몇 글자까지 입력 가능하도록 설정할 것인지를 표시합니다.
     * 여러 종류의 type 속성값을 하니씩 적용하며 알아보겠습니다.
     * type 속성값이 text 이면 짧은 텍스트를 입력하는 폼이 됩니다.
     *
     * <input type="text" name="userID" maxlength="12" />
     *
     * name 속성의 값은 입력폼의 목적에 맞는 이름을 작성합니다.
     * 아이디를 입력하는 폼이면 id, 취미를 입력하는 폼이면 hobby 이런식의 값을 입력합니다.
     * maxlength 속성의 값으로는 최대 입력 글자수를 입력합니다.
     *
     * 다음은 input 태그(type="text")를 적용한 예제입니다.
     * */
?>
</body>
</html>