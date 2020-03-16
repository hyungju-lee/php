<?php
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/common/171-session.php';
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/common/179-checkSignSession.php';
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/connection/163-connection.php';

    $searchKeyword = $dbConnect->real_escape_string($_POST['searchKeyword']);
    $searchOption = $dbConnect->real_escape_string($_POST['option']);

    if ($searchKeyword == '' || $searchKeyword == null) {
        echo "검색어가 없습니다.";
        exit;
    }

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

    $sql = "SELECT b.boardID, b.title, m.nickname, b.regTime FROM board b ";
    $sql .= "JOIN member m ON (b.memberID = m.memberID)";

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