<?php
    /*
     * 이번에는 프로퍼티에 값을 대입하는 방법에 대해 알아보겠습니다.
     * 처음에 값을 대입할 때는 변수에 값을 대입하는 방법과 같습니다.
     *
     * $color = 'blue';
     *
     * 이후에 인스턴스를 생성할 때나 메소드를 호출하여 프로퍼티에 새로운 값을 대입하기 위해서는 $this를 사용합니다.
     *
     * $this -> 프로퍼티명 = 값;
     *
     * 생성자 안에서 프로퍼티 color에 새로운 값을 대입하려면 다음과 같이 사용합니다.
     *
     * $this -> color = 값;
     *
     *
     * */

class pen
{
    public $color = '파란';
    function __construct($color)
    {
        echo "파라미터 color의 값 : {$color}";
        echo "<br>";
        echo "프로퍼티 color의 값 : {$this -> color}";
        echo "<br>";
        $this -> color = $color;
    }

    public function write($contents){
        echo "{$this->color}색 펜을 사용하여 ";
        echo "{$contents}을 쓰다.";
    }
}

$pen = new pen('핑크');
$pen -> write("글");

    /*
     * 결과의 두번째 줄을 보면 프로퍼티 color의 값은 '파란'이지만 세번째 줄에서 '핑크'로 바뀐 것을 알 수 있습니다.
     *
     * 앞에서 학습한 접근 제한자를 보면 상속이라는 내용이 있었습니다.
     * public과 protected는 상속이 가능하면, private는 상속이 불가능합니다.
     * 상속은 이미 선언된 클래스의 내용을 다른 클래스에서 사용할 수 있는 기능입니다.
     * 즉 상속을 사용하면 클래스와 클래스 간에 부모 자식 관계가 형성됩니다.
     * 상속을 사용하려면 extends 라는 명령문을 사용합니다.
     * */

?>

