<?php
    /*
     * namespace와 use 사용하기
     * 학습 내용 : 같은 함수명 또는 클래스명을 사용하면서도 에러가 발생하지 않게 하는 방법에 대해 학습합니다.
     * 힌트 내용 : namespace, use 키워드를 사용합니다.
     *
     * 한 페이지에서 함수명이 같으면 오류가 발생합니다.
     * 이는 폴더에 같은 파일을 둘 수 없는 것과 마찬가지입니다.
     * a라는 폴더에 b.php 파일을 2개 둘 순 없지만 a라는 폴더에 b.php 파일을 두고 b라는 폴더를 생성해 b.php 파일을 둘 수 있습니다.
     * 폴더에 대해 언급한 이유는 namespace(이하 네임스페이스)를 폴더라고 생각하면 이해하기 쉽기 때문입니다.
     *
     * 다음과 같이 동일한 이름의 함수명을 사용하면 에러가 납니다.
     * function loadUser(){}
     * function loadUser(){}
     *
     * 네임스페이스를 사용하면 같은 이름을 사용하더라도 오류가 발생하지 않게 할 수 있습니다.
     *
     * 네임스페이스 사용 방법
     * namespace 네임스페이스명;
     *
     * 다음은 네임스페이스를 사용하여 같은 함수명을 사용한 코드입니다.
     * namespace agroup;
     * function loadUser(){
     *  return '첫번째 loadUser() 함수';
     * }
     *
     * namespace bgroup;
     * function loadUser(){
     *  return '첫번째 loadUser() 함수';
     * }
     *
     * 앞의 코드에서 namespace 사용한 후 loadUser() 함수를 선언했습니다.
     * 첫 번째 loadUser() 함수는 네임스페이스 agroup에 소속되며,
     * 두 번째 loadUser() 함수는 네임스페이스 bgroup에 소속됩니다.
     *
     * 네임스페이스를 사용한 후의 함수를 호출하는 방법은 다음과 같습니다.
     *
     * \네임스페이스명\함수명();
     *
     * */

    namespace agroup;
    function loadUser(){
        return '첫번째 함수';
    }

    namespace bgroup;
    function loadUser(){
        return '두번째 함수';
    }

    echo \agroup\loadUser();
    echo '<br>';
    echo \bgroup\loadUser();

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
?>

