<?php

    /*
     * 위의 코드를 보시면 인스턴스를 생성하기 위해 \네임스페이스\클래스\를 사용했습니다.
     * use를 사용하면 축약한 명칭으로 변경할 수 있습니다.
     *
     * use 키워드 사용 방법
     * use \네임스페이스\클래스 as 축약한 명칭
     *
     * 예를 들어 \agroup\user 를 au로 축약하면 다음과 같습니다.
     * use \agroup\user as au;
     * 
     * */

    namespace agroup3;
    class user {
        function loadUser(){
            return '첫번째 클래스의 메소드';
        }
    }

    namespace bgroup3;
    class user {
        function loadUser(){
            return '두번째 클래스의 메소드';
        }
    }

    use \agroup3\user as au;
    use \bgroup3\user as bu;

    $au = new au;
    echo $au -> loadUser();
    echo '<br>';
    $bu = new bu;
    echo $bu -> loadUser();

?>

