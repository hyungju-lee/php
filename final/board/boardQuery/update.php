<?php
    date_default_timezone_set('Asia/Seoul');
    include '../../common/session.php';
    include '../../connection/connection.php';
    $sort = $_POST['sort'];
    $memberID = $_POST['memberId'];
    $regTime = time();
    $title = $_POST['title'];
    $content = addslashes($_POST['content']);
    $sortPK = $_POST['sortId'];
    $nowID = $_SESSION['memberID'];
    if ($memberID == $nowID) {
        $sql = "UPDATE {$sort} SET title = '{$title}', content = '{$content}', ";
        $sql .= "regTime = {$regTime} WHERE primaryKey = {$sortPK}";
        $res = $dbConnect->query($sql);
        Header("Location:list.php?sort={$sort}");
    } else {
        echo "글작성아이디".$memberID;
        echo "<br>";
        echo "현재로그인아이디".$nowID;
        echo "<br>";
        echo "내가 쓴 글이 아닙니다.";
    }
?>