<?php
  $str = " 양쪽 모두 공백 없앰 ";
  echo "l".trim($str)."l"; // l는 공백 확인을 위해 사용
  echo "<br>";

  $str = " 앞만 공백 없앰 ";
  echo "l".ltrim($str)."l"; // l는 공백 확인을 위해 사용
  echo "<br>";

  $str = " 뒤만 공백 없앰 ";
  echo "l".rtrim($str)."l"; // l는 공백 확인을 위해 사용
 ?>
