<!doctype html>
<html>
<head>
    <title>이메일 중복 체크 프로그램</title>
    <script>
        function emailCheck() {
            var xhttp = new XMLHttpRequest();
            xhttp.onreadystatechange = function () {
                if (this.readyState == 4 && this.status == 200) {
                    var result = JSON.parse(this.responseText).result;
                    if (result == 'none') {
                        document.getElementById('status').innerText = '사용 가능';
                    } else {
                        document.getElementById('status').innerText = '사용 불가';
                    }
                }
            };

            var emailAddress = document.getElementById('emailAddress').value;
            xhttp.open("POST", "161-2-server.php", true);
            xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            xhttp.send("email="+emailAddress);
        }
    </script>
</head>
<body>
    <input type="email" id="emailAddress">
    <input type="button" value="중복확인" onclick="emailCheck()">
    <p id="status"></p>
</body>
</html>

<!--
자바스크립트 언어를 사용하기 위해 script 태그를 엽니다.
emailCheck() 함수를 생성합니다.
자바스크립트에서도 php와 같이 함수 생성 방법은 동일합니다.

반환받은 데이터를 변수 result에 대입합니다.
자바스크립트에서는 변수 앞에 $를 사용하지 않습니다.
반환된 값에 따라 사용자에게 사용 가능한 이메일인지 아닌지를 알립니다.
이메일 입력폼에 입력한 이메일 주소를 변수 emailAddress 에 대입합니다.

xhttp.open() 함수의 두번째 아규먼트로 앞으로 생성할 파일인 161-2-server.php 파일을 적습니다.
이 파일은 이메일 주소를 받아서 데이터베이스에 중복된 이메일 주소가 있는지 없는지를 확인하여 결과를 반환합니다.

xhttp.setRequestHeader("Content-type", "application/x-www-form-urlencoded"); 이거는
xhttp.send("email="+emailAddress); 이거와 같이 전송할 데이터를 '변수=값' 과 같이 전송할 때 사용하는 인코딩 방식입니다.

"email="+emailAddress
여기서 사용된 + 는 php의 연결 연산자인 .(점)과 같은 역할을 합니다.
그러므로 email=mybookforweb@gmail.com 과 같은 값이 전송됩니다.
get 방식의 데이터를 전송할 때와 마찬가지로 2개 이상의 값을 보내려면 & 을 사용하여 더 값을 붙일 수 있습니다.

-->