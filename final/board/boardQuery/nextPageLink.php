<?php
    date_default_timezone_set('Asia/Seoul');

    if (!$sort) {
        $allTable = "SHOW TABLES WHERE `Tables_In_hyungju12` LIKE '%study%'";
        $resultTable = $dbConnect->query($allTable);
        $totalNum = $resultTable->num_rows;
        $i = 0;
        $sql = "";
        while ($row = mysqli_fetch_row($resultTable)) {
            $sql .= "(SELECT count(b.primaryKey), b.title, m.nickname, b.regTime FROM {$row[0]} b ";
            $sql .= "JOIN member m ON (b.memberID = m.memberID)";
            if (!$beforeSearch && $searchKeyword) {
                $sql .= " WHERE title LIKE '%{$searchKeyword}%' OR content LIKE '%{$searchKeyword}%'";
            }
            if ($beforeSearch && $searchKeyword) {
                $sql .= " WHERE (title LIKE '%{$beforeSearch}%' OR content LIKE '%{$beforeSearch}%') AND ";
                $sql .= "(title LIKE '%{$searchKeyword}%' OR content LIKE '%{$searchKeyword}%')";
            }
            $sql .= "ORDER BY primaryKey DESC LIMIT {$firstLimitValue}, {$numView})";
            $i++;
            if ($i < $totalNum) {
                $sql .= " UNION ALL ";
            }
        }
        $result = $dbConnect->query($sql);
    } else {
        $sql = "SELECT count(b.primaryKey), b.title, m.nickname, b.regTime FROM {$sort} b ";
        $sql .= "JOIN member m ON (b.memberID = m.memberID)";
        if (!$beforeSearch && $searchKeyword) {
            $sql .= " WHERE title LIKE '%{$searchKeyword}%' OR content LIKE '%{$searchKeyword}%'";
        }
        if ($beforeSearch && $searchKeyword) {
            $sql .= " WHERE (title LIKE '%{$beforeSearch}%' OR content LIKE '%{$beforeSearch}%') AND ";
            $sql .= "(title LIKE '%{$searchKeyword}%' OR content LIKE '%{$searchKeyword}%')";
        }
        $result = $dbConnect->query($sql);
    }

    if (!$result) {
        echo "오류";
    } else {
        $boardTotalCount = $result->fetch_array(MYSQLI_ASSOC);
        $boardTotalCount = $boardTotalCount['count(b.primaryKey)'];
        $totalPage = ceil($boardTotalCount / $numView);

        echo "<nav class='page navigation'>";
        echo "<ul class='text-center'>";
        echo "<li class='page-item d-inline-block'><a class='page-link' href='./list.php?page=1&sort={$sort}&beforeSearch={$beforeSearch}&searchKeyword={$searchKeyword}'>처음</a></li>";
        if ($page != 1) {
            $previousPage = $page -1;
            echo "<li class='page-item d-inline-block'><a class='page-link' href='list.php?page={$previousPage}&sort={$sort}&beforeSearch={$beforeSearch}&searchKeyword={$searchKeyword}'>이전</a></li>";
        }
        $pageTerm = 5;
        $startPage = $page - $pageTerm;
        if ($startPage < 1) {
            $startPage = 1;
        }
        $lastPage = $page + $pageTerm;
        if ($lastPage >= $totalPage) {
            $lastPage = $totalPage;
        }
        for ($i=$startPage; $i<=$lastPage; $i++) {
            if ($i == $page) {
                echo "<li class='page-item d-inline-block active'><a class='page-link' href='./list.php?page={$i}&sort={$sort}&beforeSearch={$beforeSearch}&searchKeyword={$searchKeyword}'>{$i}</a></li>";
            } else {
                echo "<li class='page-item d-inline-block'><a class='page-link' href='./list.php?page={$i}&sort={$sort}&beforeSearch={$beforeSearch}&searchKeyword={$searchKeyword}'>{$i}</a></li>";
            }
        }
        if ($page != $totalPage) {
            $nextPage = $page + 1;
            echo "<li class='page-item d-inline-block'><a class='page-link' href='./list.php?page={$nextPage}&sort={$sort}&beforeSearch={$beforeSearch}&searchKeyword={$searchKeyword}'>다음</a></li>";
        }
        echo "<li class='page-item d-inline-block'><a class='page-link' href='list.php?page={$totalPage}&sort={$sort}&beforeSearch={$beforeSearch}&searchKeyword={$searchKeyword}'>끝</a></li>";
        echo "</ul>";
        echo "</nav>";
    }
?>

