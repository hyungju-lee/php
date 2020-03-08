<?php

    /*
     * 상속받을 수 없는 메소드를 상속받은 클래스에서 호출했으므로 오류가 발생합니다.
     * 클래스는 1개의 클래스로부터 상속받을 수 있지만,
     * 2개 이상의 클래스는 상속받을 수 없습니다.
     * 그러므로 1개 이상의 자식 클래스는 있을 수 있지만,
     * 2개 이상의 부모 클래스는 있을 수 없습니다.
     *
     * 다음은 1개의 부모 클래스와 2개의 자식 클래스를 생성한 예제입니다.
     * */

    class operation {
        function plus($num1, $num2){
            $result = $num1 + $num2;
            return "{$num1} + {$num2} = ".$result;
        }
    }

    class load extends operation{}
    class load2 extends operation{}

    $load2 = new load2;
    echo $load2 -> plus(1, 2);

    /*
     * 코드 105-6에서 접근 제한자의 상속 가능, 상속 불가능에 대해 알아보았습니다.
     * 이번에는 접근 제한자의 public 의 의미인 클래스 밖에서도 안에서도 접근 가능의 의미와
     * protected, private의 클래스 내부에서만 접근 가능의 의미에 대해 알아보겠습니다.
     * */
?>

