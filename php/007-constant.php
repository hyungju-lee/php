<?php
  /*
  한 번 값을 대입하면 값이 변경되지 않는 상수에 대해 학습합니다.
  상수를 선언하려면 define을 사용합니다.

  변수는 변하는 수를 의미합니다.
  즉 변수의 값이 또 다른 값으로 변해야 할 이유가 있다면 변수를 사용하며,
  대입한 값이 절대 변하지 않아야 한다면 상수를 사용합니다.

  상수를 선언하고 값을 대입하면 그 이후에 다른 값을 대입해도 값이 대입되지 않습니다.

  상수 선언 방법 : defind(상수명, 상수값);

  상수명 또한 변수명 짓기의 규칙을 지킵니다.
  하지만 프로그래머 사이에 관례적으로 상수 선언 시에는 보통 상수명을 대문자를 사용하며
  두 개의 단어로 상수명을 사용할 경우 언더바를 사용합니다.

  다음은 상수 선언 후 상수의 값을 출력하며, 이후 같은 상수에 다른 값을 대입하여 값이 변하는지
  확인하는 예제입니다.
  */

  // 상수 FAVORITE_DOLL에 값 gelatoni를 대입
  define("FAVORITE_DOLL", "gelatoni");
  echo "상수 FAVORITE_DOLL의 값은 ".FAVORITE_DOLL."<br>";

  // 상수 FAVORITE_DOLL에 값 duffy를 대입
  define("FAVORITE_DOLL", "duffy");
  echo "상수 FAVORITE_DOLL의 값은 ".FAVORITE_DOLL;
?>
