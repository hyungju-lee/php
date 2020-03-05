<?php
  echo "int 또는 integer : 숫자 - 정수";
  echo "<br>";
  echo "double : 숫자 - 소수";
  echo "<br>";
  echo "string : 문자열";
  echo "<br>";
  echo "boolean : 논리값(값 : true, false)";
  echo "<br>";
  echo "NULL : 없는값(값 : null)";
  echo "<br>";
  echo "array : 배열";
  echo "<br><br>";
  echo "NULL 값은 없는 값을 의미하는 데이터형입니다. <br>
  값이 없다는 것 또한 변수의 값으로 대입할 수 있습니다. <br>
  boolean은 true와 false의 2개 값만 대입할 수 있습니다. <br>
  즉, 참이냐 거짓이냐의 두가지 값만 갖는 데이터형입니다. <br><br>

  프로그래밍 언어 중 JAVA나 C언어 등에서는 변수를 지정할 때 변수에 데이터형도 함께
  지정해 주어야 합니다.<br><br>

  숫자 중 정수만 받으려면 앞에 나열한 데이터형의 종류 중 int를 변수 선언 시 함께 지정해 주어
  선언합니다. <br>
  PHP는 값을 확인한 후 데이터형을 자동으로 지정해줍니다. <br>
  gettype() 함수는 데이터형을 알려주는 기능을 합니다. <br><br>

  다음은 변수의 값의 데이터형을 gettype() 함수를 사용해 확인하는 예제입니다.";

  echo "<br><br>";

  $num = 12;
  echo "\$num의 데이터형(값 {$num})은 ".gettype($num);
  echo "<br>";
  $greeting = "안녕";
  echo "\$greeting의 데이터형(값 {$greeting})은 ".gettype($greeting);
  echo "<br>";
  $numStr = "121212";
  echo "\$numStr의 데이터형(값 {$numStr})은 ".gettype($numStr);
  echo "<br>";
  $fruit = array();
  echo "\$fruit의 데이터형은 ".gettype($fruit);
  echo "<br>";
  $nai = null;
  echo "\$nai의 데이터형(값 {$nai})은 ".gettype($nai);
  echo "<br>";
  $boolean = true;
  echo "\$boolean의 데이터형(값 {$boolean})은 ".gettype($boolean);
 ?>
