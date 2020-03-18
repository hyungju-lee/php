<?php
    date_default_timezone_set('Asia/Seoul');
    include '../../common/session.php';
    include '../../common/checkSignSession.php';
    include '../../connection/connection.php';

    // 검색폼에서 전달받은 데이터를 변수에 대입합니다.
    $searchKeyword = $dbConnect->real_escape_string($_POST['searchKeyword']);
    $searchOption = $dbConnect->real_escape_string($_POST['option']);

    // 검색어의 공백 여부를 확인합니다.
    if ($searchKeyword == '' || $searchKeyword == null) {
        echo "검색어가 없습니다.";
        exit;
    }

    // 검색 옵션이 올바른 값인지 확인합니다.
    switch ($searchOption) {
        case 'title':
        case 'content':
        case 'tandc':
        case 'torc':
            break;
        default :
            echo "검색 옵션이 없습니다.";
            exit;
            break;
    }

    // 게시물을 불러오는 쿼리문이며 WHERE 문은 포함되지 않았습니다.
    $sql = "SELECT b.jqueryID, b.title, m.nickname, b.regTime FROM jquery b ";
    $sql .= "JOIN member m ON (b.memberID = m.memberID)";

    // 검색 옵션값에 따른 쿼리문의 WHERE 문입니다.
    switch ($searchOption) {
        case 'title':
            $sql .= "WHERE b.title LIKE '%{$searchKeyword}%'";
            break;
        case 'content':
            $sql .= "WHERE b.content LIKE '%{$searchKeyword}%'";
            break;
        case 'tandc':
            $sql .= "WHERE b.title LIKE '%{$searchKeyword}%'";
            $sql .= " AND ";
            $sql .= "b.content LIKE '%{$searchKeyword}%'";
            break;
        case 'torc';
            $sql .= "WHERE b.title LIKE '%{$searchKeyword}%'";
            $sql .= " OR ";
            $sql .= "b.content LIKE '%{$searchKeyword}%'";
            break;
    }

    $result = $dbConnect->query($sql);
    if ($result) {
        $dataCount = $result->num_rows;
    } else {
        echo "오류 발생 - 관리자 문의";
        exit;
    }

?>
<!DOCTYPE HTML>
<html lang="ko-KR">
<?php
$title = '검색결과';
$root = '../..';
include "../../include/head.php";
?>
<body>
<div id="wrap">
    <?php
    $root = '../..';
    include "../../include/header.php";
    ?>
    <div id="container">
        <div id="contents">
            <a href="./writeForm.php">글작성하기</a>
            <a href="../../signIn/signOut.php">로그아웃</a>
            <table>
                <thead>
                <th>번호</th>
                <th>제목</th>
                <th>작성자</th>
                <th>게시일</th>
                </thead>
                <tbody>
                <?php
                if ($dataCount > 0) {
                    for ($i=0; $i<$dataCount; $i++) {
                        $memberInfo = $result->fetch_array(MYSQLI_ASSOC);
                        echo "<tr>";
                        echo "<td>".$memberInfo['jqueryID']."</td>";
                        echo "<td><a href='./view.php?jqueryID={$memberInfo['jqueryID']}'>";
                        echo "{$memberInfo['title']}</a></td>";
                        echo "<td>".$memberInfo['nickname']."</td>";
                        echo "<td>".date('Y-m-d H:i', $memberInfo['regTime'])."</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='4'>{$searchKeyword}를 포함하는 게시글이 없습니다.</td></tr>";
                }
                ?>
                </tbody>
            </table>
        </div>
    </div>
    <?php
    include "../../include/footer.php";
    ?>
</div>
<?php
$root = '../..';
include "../../include/script.php";
?>
</body>
</html>
