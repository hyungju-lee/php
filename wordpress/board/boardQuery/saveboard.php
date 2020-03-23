<?php
    /*
     * 앞에서 생성한 게시글 입력폼 페이지에서 입력한 정보를 $sort 테이블에 저장하는 기능을 생성하겠습니다.
     * 제목을 입력하는 태그와 내용을 입력하는 태그에 required 속성을 사용했습니다.
     * 서버에서도 이 값이 제대로 입력되었는지 확인 후 제대로 입력되었다면 테이블에 입력하며
     * 그렇지 않은 경우 게시글 입력폼이 있는 페이지로 이동하는 링크를 출력합니다.
     *
     * 다음은 게시글을 $sort 테이블에 저장하는 예제입니다.
     * */

    date_default_timezone_set('Asia/Seoul');

    // $sort 테이블의 memberID 필드에는 $_SESSION['memberID'] 의 값을 입력하므로
    // session_start() 함수가 있는 파일을 include 합니다.
    include '../../common/session.php';
    // 로그인을 하지 않고 181-save$sort.php 에 접근하는 것을 방지하도록 179-checkSignSession.php 파일을 include 합니다.
    include '../../common/checkSignSession.php';
    // $sort 테이블에 데이터를 입력하므로 데이터베이스 접속 프로그램인 163-connection.php 파일을 include 합니다.
    include '../../connection/connection.php';

    $sort = $_GET['sort'];
    $sortID = $sort.'ID';

    // 전달받은 제목과 내용을 변수에 대입합니다.
    $title = $_POST['title'];
    $content = $_POST['content'];

    // 제콕 데이터인 변수 title 의 값이 공백인지 확인하며 공백이 아니면 real_escape_string() 메소드를 사용합니다.
    // real_escape_string() 함수는 문자열 속 특수문자가 쿼리문에서 오류를 일으키지 않도록 하는 기능을 갖습니다.
    if ($title != null && $title != '') {
        $title = $dbConnect->real_escape_string($title);
    } else {
        echo "제목을 입력하세요.";
        echo "<a href='writeForm.php?sort={$sort}'>작성 페이지로 이동</a>";
    }

    // 내용 데이터 변수 content 의 값이 공백인지 확인하며 공백이 아니면 real_escape_string() 메소드를 사용합니다.
    if ($content != null && $content != '') {
        $content = $dbConnect->real_escape_string($content);
    } else {
        echo "내용을 입력하세요.";
        echo "<a href='writeForm.php?sort={$sort}'>작성 페이지로 이동</a>";
        exit;
    }

    // $sort 테이블의 memberID 필드에 입력할 값이 세션 $_SESSION['memberID'] 를 변수 memberID 에 대입합니다.
    $memberID = $_SESSION['memberID'];

    // 해당 게시물의 입력 시간을 변수 regTime 에 대입합니다.
    $regTime = time();

    // 게시물을 $sort 테이블에 입력하는 쿼리문입니다.
    $sql = "INSERT INTO {$sort} (memberID, title, content, regTime) ";
    $sql .= "VALUES ({$memberID}, '{$title}', '{$content}', {$regTime})";
    // 쿼리문을 실행합니다.
    $result = $dbConnect->query($sql);


?>
<!DOCTYPE HTML>
<html lang="ko-KR">
<?php
$title = '게시글 저장';
$root = '../..';
include "../../include/head.php";
?>
<body>
<div class="wrap">
    <?php
    $root = '../..';
    include "../../include/header.php";
    ?>
    <div class="container center">
        <?php
        if ($result) {
            echo "<div class='save'>";
            echo "<em class='d-block mb-3'>저장 완료</em>";
            echo "<a class='btn btn-dark' href='./list.php?sort={$sort}'>게시글 목록으로 이동</a>";
            echo "</div>";
        } else {
            echo "<div class='save'>";
            echo "<em class='d-block mb-3'>저장 실패 - 관리자에게 문의</em>";
            echo "<a class='btn btn-dark' href='./list.php?sort={$sort}'>게시글 목록으로 이동</a>";
            echo "</div>";
        }
        ?>
    </div>
    <?php
    include "../../include/footer.php";
    ?>
</div>
</body>
</html>