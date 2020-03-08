<?php

    /*
     * protected 로 선언된 메소드를 클래스 밖에서 호출하여 에러가 발생합니다.
     *
     * 다음은 protected로 선언하여 같은 클래스 내에서 호출하는 함수입니다.
     * 같은 클래스에서 프로퍼티를 사용할 때 $this를 사용했듯이 같은 클래스에서 메소드를 사용하려면 $this를 사용합니다.
     * */

    class a{
        protected function hello() {
            echo 'hello world';
        }

        public function print2() {
            $this -> hello();
        }
    }

    $a = new a;
    $a -> print2();

    /*
     * 지금까지는 클래스의 인스턴스를 생성하여 객체에서 메소드를 호출할 수 있었습니다.
     * 이번에는 인스턴스 생성 없이 메소드를 호출하는 방법에 대해 알아보겠습니다.
     * 메소드를 선언할 때 function 앞에 static을 붙여주면 해당 메소드는 클래스 외부에서 인스턴스를 생성하지 않고도 호출할 수 있는 메소드가 됩니다.
     * */
?>

