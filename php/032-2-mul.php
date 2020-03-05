<?php
  for ($i=2; $i <= 3 ; $i++) {
    // code...
    echo "{$i}단<br>";

    for ($n=1; $n <= 9 ; $n++) {
      // code...
      $mul = $i * $n;
      echo "{$i} 곱하기 {$n} = {$mul}<br>";
    }

    echo "<br><br>";
  }
 ?>
