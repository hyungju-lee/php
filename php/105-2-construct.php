<?php
    class pen {
        public $color;
        public $bold;
        public $price;

        function __construct($color, $bold, $price){
            echo "사용중인 펜";
            echo "<br>";
            echo "색 : {$color}";
            echo "<br>";
            echo "두께 : {$bold}";
            echo "<br>";
            echo "가격 : {$price}";
        }
    }

    $pen = new pen('핑크', '두꺼운', '1000');

    /*
     * 생성자를 사용하고 파라미터로 color, bold, price를 사용합니다.
     * 클래스 pen의 인스턴스를 생성하고 아규먼트를 사용합니다.
     * 이 아규먼트는 클래스 pen의 생성자(__construct)에 전달되어 10, 12, 14라인에서 사용됩니다.
     *
     * 생성자와 반대의 개념으로 소멸자가 있습니다.
     * 소멸자는 인스턴스의 사용이 끝날 때 작동합니다.
     * 생성자와 마찬가지로 _(언더바)를 2회 적고 destruct를 적습니다.
     * */


?>

