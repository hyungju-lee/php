<?php
    class pen {
        public $color;
        public $bold;
        public $price;

        public function write($contents){
            echo "{$contents}을 쓰다.";
        }
        
        public function draw($contents){
            echo "{$contents}을 그리다.";
        }
    }
    
    $pen = new pen();
    $pen -> write("책");

    /*
     * 인스턴스를 생성할 때 클래스명 뒤에 '()'를 사용했습니다.
     * '()'의 용도에 대해 알아보겠습니다.
     * 클래스의 인스턴스를 생성할 때 자동적으로 실행되는 메소드가 있습니다.
     * 생성자는 인스턴스를 생성하면 자동적으로 호출됩니다.
     * */

    /*
     * 생성자 사용 방법
     * class 클래스(){
     *  function __construct(){
     *
     *  }
     * }
     * */

    /*
     * construct() 앞에 위치한 _(언더바)은 2회 사용합니다.
     * 인스턴스를 생성할 때 '()' 안에 아규먼트를 입력하면 이 값은 클래스의 생성자에 전달됩니다.
     * 다음은 클래스에 생성자를 사용한 예제입니다.
     * */
?>

