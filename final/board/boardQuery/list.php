<?php
    date_default_timezone_set('Asia/Seoul');
    include '../../common/session.php';
    include '../../connection/connection.php';

    $sort = null;
    $beforeSearch = null;
    $searchKeyword = null;
    $totalSearch = null;
    if (isset($_GET['sort'])) {
        $sort = $_GET['sort'];
    }
    if (isset($_GET['beforeSearch'])) {
        $beforeSearch = $_GET['beforeSearch'];
    }
    if (isset($_GET['searchKeyword'])) {
        $searchKeyword = $_GET['searchKeyword'];
    }
    if (!$sort) {
        $totalSearch = true;
    }

    if (isset($_GET['page'])) {
        $page = (int) $_GET['page'];
    } else {
        $page = 1;
    }
    $numView = 20;
    $firstLimitValue = ($numView * $page) - $numView;
    if (!$sort) {
        $allTable = "SHOW TABLES WHERE `Tables_In_hyungju12` LIKE '%study%'";
        $resultTable = $dbConnect->query($allTable);
        $totalNum = $resultTable->num_rows;
        $i = 0;
        $sql = "";
        $sql .= "(";
        while ($row = mysqli_fetch_row($resultTable)) {
            $sql .= "(SELECT b.tableName, b.primaryKey, b.title, m.nickname, b.regTime FROM {$row[0]} b ";
            $sql .= "JOIN member m ON (b.memberID = m.memberID)";
            if (!$beforeSearch && $searchKeyword) {
                $sql .= " WHERE title LIKE '%{$searchKeyword}%' OR content LIKE '%{$searchKeyword}%')";
            }
            if ($beforeSearch && $searchKeyword) {
                $sql .= " WHERE (title LIKE '%{$beforeSearch}%' OR content LIKE '%{$beforeSearch}%') AND ";
                $sql .= "(title LIKE '%{$searchKeyword}%' OR content LIKE '%{$searchKeyword}%'))";
            }
            $i++;
            if ($i < $totalNum) {
                $sql .= " UNION ALL ";
            }
        }
        $sql .= ") ORDER BY primaryKey DESC LIMIT {$firstLimitValue}, {$numView}";
        $result = $dbConnect->query($sql);
        $dataCount = $result->num_rows;
    } else {
        $sql = "SELECT b.tableName, b.primaryKey, b.title, m.nickname, b.regTime FROM {$sort} b ";
        $sql .= "JOIN member m ON (b.memberID = m.memberID)";
        if (!$beforeSearch && $searchKeyword) {
            $sql .= " WHERE title LIKE '%{$searchKeyword}%' OR content LIKE '%{$searchKeyword}%'";
        }
        if ($beforeSearch && $searchKeyword) {
            $sql .= " WHERE (title LIKE '%{$beforeSearch}%' OR content LIKE '%{$beforeSearch}%') AND ";
            $sql .= "(title LIKE '%{$searchKeyword}%' OR content LIKE '%{$searchKeyword}%')";
        }
        $sql .= "ORDER BY primaryKey DESC LIMIT {$firstLimitValue}, {$numView}";
        $result = $dbConnect->query($sql);
        $dataCount = $result->num_rows;
    }
?>
<!DOCTYPE HTML>
<html lang="ko-KR">
<?php
    $title = '게시물목록';
    $root = '../..';
    include "../../include/head.php";
?>
<body>
<div class="wrap">
    <?php
    include "../../include/header.php";
    ?>
    <div class="container">
        <div class="contents">
            <div class="btn-area text-right">
                <a class="btn btn-dark" href="../../index.php">메인</a>
                <?php
                echo "<a class='btn btn-dark' href='list.php?sort={$sort}'>목록</a>";
                if (!isset($_SESSION['memberID'])) {
                    ?>
                    <a class="btn btn-dark d-inline-block" href="../../signUp/signUpForm.php">회원가입</a>
                    <a class="btn btn-dark d-inline-block" href="../../signIn/signInForm.php">로그인</a>
                    <?php
                } else {
                    ?>
                    <a class="btn btn-dark d-inline-block" href="../../signIn/signOut.php">로그아웃</a>
                    <?php
                }
                ?>
            </div>
            <div class="btn-area mb-4 mt-4">
                <?php
                if (isset($_SESSION['memberID'])) {
                    $memberID = $_SESSION['memberID'];
                    echo "<form class='del-form d-inline-block align-top' action='writeForm.php?sort={$sort}' method='post'>";
                    echo "<button type='submit' class='btn btn-dark'>글쓰기</button>";
                    echo "</form>";
                }
                if (($dataCount > 0) && !($beforeSearch && $searchKeyword)) {
                    $route = ".";
                    include 'searchForm.php';
                }
                if ($searchKeyword && !$beforeSearch) {
                    echo "<p class='note'>제목 또는 내용에 '{$searchKeyword}'를(을) 포함하는 게시글은 다음과 같습니다.</p>";
                } elseif ($searchKeyword && $beforeSearch) {
                    echo "<p class='note'>제목 또는 내용에 '{$beforeSearch}'와(과) '{$searchKeyword}'를(을) 포함하는 게시글은 다음과 같습니다.</p>";
                }
                ?>
            </div>
            <?php
            echo "<h2 class='list_h2'>{$sort} 게시판</h2>";
            if ($dataCount > 0) {
                echo "<ul class='page_list'>";
                for ($i=0; $i<$dataCount; $i++) {
                    $memberInfo = $result->fetch_array(MYSQLI_ASSOC);
                    echo "<li class='page_list_item'>";
                    echo "<a class='page_link float-area' href='view.php?boardID={$memberInfo['primaryKey']}&sort={$memberInfo['tableName']}&beforeSearch={$beforeSearch}&searchKeyword={$searchKeyword}&totalSearch={$totalSearch}'>";
                    echo "<span class='float-left'><em class='em mr-2'>[No ".$memberInfo['primaryKey']."]</em> "." [".$memberInfo['tableName']."] "."[".$memberInfo['title']."]</span>";
                    echo "<strong class='float-right white-space-nowrap'><span class='mr-2'>[".$memberInfo['nickname']."]</span> [".date('Y-m-d H:i', $memberInfo['regTime'])."]</strong>";
                    echo "</a>";
                    echo "</li>";
                }
                echo "</ul>";
            } else {
                echo "<p class='note'>게시글이 없습니다.</p>";
            }
                include 'nextPageLink.php';
            ?>
        </div>
    </div>
    <?php
    include "../../include/footer.php";
    ?>
</div>
<?php
include "../../include/script.php";
?>
</body>
</html>
