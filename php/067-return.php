<?php
    function sum($num1, $num2){
        $sum = $num1 + $num2;
        return $sum;

        echo '함수';
    }

    echo sum(5, 10);

    $plus = sum(5, 11);
    echo '<br>';
    echo $plus + 20;
?>
