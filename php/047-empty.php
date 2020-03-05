<?php
  /*
    변수의 값이 비어 있는지 아닌지를 확인할 때는 empty() 함수를 사용합니다.
    값이 비어 있다면 true를 반환하고 그렇지 않다면 false를 반환합니다.
    여기에서 비어 있는 값은 다음과 같습니다.

    빈 문자열
    $a = '';

    null 데이터형
    $a = null;

    데이터가 없는 배열
    $a = array();
    $a = [];

    숫자 0과 문자열 "0"
    $a = 0;
    $a = "0";
  */

  $var = "";
  echo "값이 빈 문자열인 경우";
  var_dump(empty($var));
  echo "<br>";

  $var = null; // 소문자로 작성해도 무관
  echo "값이 null인 경우";
  var_dump(empty($var));
  echo "<br>";

  $var = array(); // array() 대신 []를 작성해도 무관
  echo "값이 빈 배열인 경우";
  var_dump(empty($var));
  echo "<br>";

  $var = 0;
  echo "값이 정수 0인 경우";
  var_dump(empty($var));
  echo "<br>";

  $var = '0';
  echo "값이 문자열 0인 경우";
  var_dump(empty($var));
  echo "<br>";

  $var = "string";
  echo "값이 문자열 string인 경우";
  var_dump(empty($var));
  

 ?>
