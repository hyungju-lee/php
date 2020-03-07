<?php
    /*
     * filter_Var() 함수로 이메일 유효성 검사하기
     * 학습 내용 : 정규표현식을 이용하지 않고 더 간단하게 이메일 주소의 유효성을 검사할 수 있습니다.
     * 힌트 내용 : filter_Var() 함수를 사용합니다.
     *
     * 이메일 주소의 유효성을 검사하기 위해 어려운 정규식에 대해 알아보았습니다.
     * 이메일 주소의 유효성을 검사하는 기능은 filter_Var() 함수를 이용해 더욱 간단히 구현할 수 있습니다.
     *
     * filter_Var() 함수에 첫번째 아규먼트로 이메일 주소를 입력하고,
     * 두번째 아규먼트로 상수 FILTER_VALIDATE_EMAIL를 입력합니다.
     * 상수 FILTER_VALIDATE_EMAIL는 이미 선언된 상수이므로 따로 선언할 필요는 없습니다.
     *
     * filter_Var('검사할 값', FILTER_VALIDATE_EMAIL);
     *
     * filter_Var() 함수의 두번째 아규먼트의 값에 따라 검사할 유형이 달라지는 방식입니다.
     * 다음은 filter_Var() 함수를 사용하여 이메일 주소의 유효성을 검사하는 예제입니다.
     *
     * */

    function checkEmail($email){
        $emailCheck = filter_var($email, FILTER_VALIDATE_EMAIL);
        $returnInfo = false;
        if ($emailCheck) {
            $returnInfo = true;
        }
        
        return $returnInfo;
    }
    
    $email = "mybookforweb@gmail.com";
    
    if(checkEmail($email)){
        echo "{$email}는 올바른 이메일 주소입니다.";
    }else{
        echo "{$email}는 잘못된 이메일 주소입니다.";
    }

    /*
     * 이메일을 검사하는 함수입니다.
     * 파라미터로 이메일 주소를 받고 이메일 주소가 유효성에 적합하면 true를 반환하고
     * 적합하지 않으면 false를 반환합니다.
     *
     * 함수에서 받은 파라미터로 filter_var() 함수를 사용해 이메일 주소의 유효성을 체크하여 반환받은 값을
     * 변수 $emailCheck에 대입합니다.
     *
     * checkEmail() 함수가 반환할 값을 대입하는 변수 returnInfo에 false를 대입합니다.
     *
     * 변수 emailCheck 변수의 값이 true이면 변수 returnInfo에 true를 대입합니다.
     *
     * 변수 returnInfo를 반환합니다.
     *
     * 이메일 주소 유효성에 적합한 이메일 주소를 변수 email에 대입합니다.
     *
     * if문의 조건에 checkMail() 함수를 사용하고 반환된 값에 따라 다른 결과를 나타냅니다.
     * */
?>
