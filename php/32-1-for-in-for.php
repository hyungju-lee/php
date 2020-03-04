<?php
  for ($i=1; $i <= 3 ; $i++) {
    // code...
    echo "바깥쪽 for문 횟수 : {$i}<br>";

    for ($n=1; $n <= 3 ; $n++) {
      // code...
      echo "안쪽 for문 횟수 : {$n}<br>";
    }

    echo "<br>";
  }
 ?>
