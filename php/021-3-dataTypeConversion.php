<?php
  $double = 86.44;
  echo "데이터형 변경 전의 데이터형 ".gettype($double)."<br>";

  $double = (int) $double;
  echo "데이터형 변경 후의 데이터형 ".gettype($double)." 값은 {$double}";
 ?>
