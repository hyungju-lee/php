<!DOCTYPE html>
<html>
<head>
    <title>PHP</title>
</head>
<body>
<form name="" method="" action="">
    음악감상 <input type="checkbox" name="myHobby" value="music">
    영화감상 <input type="checkbox" name="myHobby" value="movie" checked>
    수집 <input type="checkbox" name="myHobby" value="collection">
</form>

<?php
    /*
     * form 태그에서 사용하는 input 태그 - checkbox
     * 학습 내용 : 여러 가지 보기 중에 다수의 값을 선택하는 폼을 만드는 방법에 대해 학습합니다.
     * 힌트 내용 : input 태그를 사용하여, type 속성의 값으로 checkbox를 사용합니다.
     *
     * type 속성의 값이 checkbox 이면 여러 보기를 만들고 선택할 수 있습니다.
     * 체크박스는 나열되어 있는 몇 개의 단어 중에서 여러 값을 선택할 때 사용하는데,
     * value 라는 속성을 사용합니다.
     * value 속성에는 실제 서버에 전송할 값을 입력합니다.
     *
     * type 속성값이 text 또는 password 이면 입력한 것 자체가 값이기 때문에 value 속성이 필요 없었습니다.
     * checkbox 는 여러 값을 받기 위해 사용되므로 어떠한 체크박스를 선택했을 때 그것이 체크되면
     * 어떠한 값을 선택했는지 표시해야 합니다.
     * value 속성을 명시하지 않으면 빈 값이 전송됩니다.
     *
     * <input type="checkbox" name="myHobby" value="music" />
     *
     * type 속성값이 checkbox 이면 checked 라는 옵션을 사용할 수 있습니다.
     * 기본적으로는 체크박스에 체크가 되지 않은 상태로 표시되지만,
     * checked 옵션을 사용하면 기본적으로 체크된 상태로 표시됩니다.
     *
     * <input type="checkbox" name="myHobby" value="music" checked />
     *
     * 또한 한 항목에 대한 여러 보기를 만들 때 name 같은 한 항목이 모두 동일해야 합니다.
     * 예를 들어 취미가 무엇인지에 대한 보기를 만든다면 해당 보기는 모두 같은 name 속성의 값을 사용해야 합니다.
     * */
?>
</body>
</html>