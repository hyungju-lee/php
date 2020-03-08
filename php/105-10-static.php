<?php

    /*
     * 지금까지는 클래스의 인스턴스를 생성하여 객체에서 메소드를 호출할 수 있었습니다.
     * 이번에는 인스턴스 생성 없이 메소드를 호출하는 방법에 대해 알아보겠습니다.
     * 메소드를 선언할 때 function 앞에 static을 붙여주면 해당 메소드는 클래스 외부에서 인스턴스를 생성하지 않고도 호출할 수 있는 메소드가 됩니다.
     *
     * static 사용 방법
     * static function 메소드명(){}
     *
     * 접근 제한자를 사용하여 메소드를 생성할 경우에는 접근 제한자 다음에 static을 기입합니다.
     *
     * 접근제한자 static function 메소드명(){}
     *
     * 인스턴스를 생성하지 않고 클래스를 사용하려면 클래스명 뒤에 (::)를 사용한 후 메소드명을 입력합니다.
     *
     * 클래스명::메소드명();
     * */

    class hello {
        public static function output($word){
            echo $word;
        }
    }

    hello::output("hello world");
?>

