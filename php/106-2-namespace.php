<?php
    /*
     * 네임스페이스를 사용하면 같은 이름의 클래스도 사용할 수 있습니다.
     * 같은 이름을 사용하지 않으면 되는데 왜 네임스페이스라는게 있는가 생각하게 됩니다.
     * 간단한 프로그램을 만든다면 관계없지만 대규모 시스템을 개발하다보면 이러한 문제가 생길 확률은 더 커지게 됩니다.
     * 또한 요즘 시대의 개발은 직접 작성하는 것보다는 이미 구현되어 있는 기능을 인터넷에서 다운로드 받아 사용하는 경우도 굉장히 많습니다.
     * 이런 경우 기존의 시스템의 클래스명과 새로 다운로드한 기능의 클래스명이 같아서 문제를 일으키는 경우도 발생합니다.
     * 이러한 문제들로 네임스페이스를 사용합니다.
     *
     * 다음은 네임스페이스를 사용하여 같은 클래스명과 메소드명을 사용한 코드입니다.
     *
     * namespace agroup;
     * class user {
     *  function loadUser(){
     *      return '첫번째 클래스의 메소드';
     *  }
     * }
     * 
     * namespace bgroup;
     * class user {
     *  function loadUser(){
     *      return '두번째 클래스의 메소드';
     *  }
     * }
     *
     * 앞의 코드는 같은 이름의 함수를 선언할 때와 별반 다르지 않습니다.
     * 클래스의 인스턴스를 생성하는 방법도 크게 다르지 않습니다.
     *
     * new \네임스페이스명\클래스명
     *
     * 
     * */

    namespace agroup2;
    class user {
        function loadUser(){
            return "첫 번째 클래스의 메소드";
        }
    }

    namespace bgroup2;
    class user {
        function loadUser(){
            return "두 번째 클래스의 메소드";
        }
    }

    $aUser = new \agroup2\user;
    echo $aUser->loadUser();
    echo '<br>';
    $bUser = new \bgroup2\user;
    echo $bUser->loadUser();


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
?>

