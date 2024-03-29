<?php
    /*
     * 정규표현식 이메일 주소 유효성 검사하기
     * 학습 내용 : 정규표현식을 이용하여 이메일 주소의 패턴을 검사할 수 있습니다.
     * 힌트 내용 : 이메일 주소는 [아이디@도메인]으로 구성됩니다.
     *
     * 정규표현식을 이용해 이메일 주소가 맞는지 확인하는 패턴식을 만들겠습니다.
     * 이메일 주소의 @(at) 앞에는 아이디가 위치하며, 뒤에는 도메인 주소가 위치합니다.
     * 우선 아이디부터 패턴식을 만들겠습니다.
     * 아이디는 보통 영문 대문자, 영문 소문자, 숫자, _(언더바), -(하이픈), .(점)이 섞여서 위치하며
     * 아이디 앞에는 _(언더바), -(하이픈), .(점)이 위치하지 않습니다.
     *
     * -(하이픈)은 [] 안에서 간격을 의미하므로 문자로 사용하려면 앞에 \(역슬래시)를 사용합니다.
     *
     * [\-]
     *
     * .(점)은 [] 밖에서 모든 문자를 의미하므로 문자로 사용하려면 앞에 \(역슬래시)를 사용합니다.
     *
     * [\.]
     *
     * _(언더바), -(하이픈), .(점)이 아이디 앞에 위치하지 않는 패턴식을 만들면 다음과 같습니다.
     *
     * $pattern = '/^[^\.\-\_]/'
     *
     * 하지만 이외에도 많은 특수문자가 앞에 위치하면 안 되므로 첫 글자가 영문 소문자, 영문 대문자가 위치하도록 하는 편이 더 편리합니다.
     *
     * $pattern = '/^[a-zA-Z]{1}/;'
     *
     * 다음은 아이디에 영문 대문자, 영문 소문자, _(언더바), -(하이픈), .(점)를 허용하는 패턴식입니다.
     *
     * $pattern = '/[a-zA-Z0-9\.\-\_]+/';
     *
     * 앞의 두 아이디에 관한 패턴식을 합치면 다음과 같습니다.
     *
     * $pattern = '/^[a-zA-Z]{1}[a-zA-Z0-9\.\-\_]+/';
     *
     * 다음으로 위치할 문자는 이메일 주소에 필수로 쓰이는 @(at)입니다.
     * @(at)을 더하면 패턴식은 다음과 같습니다.
     *
     * $pattern = '/^[a-zA-Z]{1}[a-zA-Z0-9\.\-\_]+@/';
     *
     *
     * @(at)의 뒤에는 도메인이 위치합니다.
     * 도메인은 tomodevel.jp이나 everdevel.com과 같이 .(점)으로 구분됩니다.
     * .(점)을 기준으로 앞의 도메인은 영문 소문자, 숫자, -(하이픈)으로 구성되며,
     * 앞과 뒤에 -(하이픈)이 위치할 수 없습니다.
     * 그러므로 앞과 뒤에는 영문 소문자나 숫자가 위치하고 중간에는 하이픈이 들어갈 수 있는 패턴식을 만듭니다.
     *
     * .com / .co.kr 등등 고려
     *
     *
     * */

    $pattern = '/^[a-zA-Z]{1}[a-zA-Z0-9\.\-\_]+@[a-z0-9]{1}[a-z0-9\-]+[a-z0-9]{1}\.(([a-z]{1}[a-z\.]+[a-z]{1})|([a-z]+))$/';
    $str = 'mybookforweb@gmail.com';
    if(preg_match($pattern, $str, $matches)) {
        echo "값 {$str}은(는) 이메일 주소 유효성에 적합한 값이다.";
        echo "<pre>";
        var_dump($matches);
        echo "</pre>";
    }else{
        echo "이메일 주소 유효성에 맞지 않습니다.";
    }

?>
