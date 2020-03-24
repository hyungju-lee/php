<?php
    /*
     * 다음 페이지로 이동 링크 생성하기
     * 앞에서 생성한 게시물 목록의 쪽수를 출력하는 코드 183의 65 라인에 작성된 184-nextPageLink.php 파일을 구현하겠습니다.
     *
     * 처음 이전 1 2 3 4 5 6 7 8 9 다음 끝
     *
     * 게시물의 페이지 기능은 위와 같이 구성됩니다.
     * 처음 링크는 첫페이지로 이동하는 링크입니다.
     * 이전 링크는 현재 페이지의 이전 페이지로 이동하는 링크입니다.
     * 페이지 수 링크는 현재 페이지를 기준으로 앞페이지 5개를 표시하고 뒷페이지 5개를 표시합니다.
     * 다음 링크는 현재 페이지의 다음 페이지로 이동하는 링크입니다.
     * 끝 링크는 가장 마지막 페이지로 이동하는 링크입니다.
     *
     * 이전 페이지가 없는 경우에는 [이전] 링크를 표시하지 않으며 다음 페이지가 없는 경우 [다음]링크를 표시하지 않습니다.
     * 처음 링크와 끝 링크는 항상 표시합니다.
     * */

    date_default_timezone_set('Asia/Seoul');

    // 전체 레코드 수 구하기
    // $sort 테이블의 레코드 수를 불러오는 쿼리문입니다.
//    $sql = "SELECT count({$sortID}) FROM {$sort}";
    // 쿼리문을 실행합니다.
//    $result = $dbConnect->query($sql);


    $sql = "SELECT count(b.{$sortID}), b.title, m.nickname, b.regTime FROM {$sort} b ";
    $sql .= "JOIN member m ON (b.memberID = m.memberID)";

    if (!$beforeSearch && $searchKeyword) {
        $sql .= " WHERE title LIKE '%{$searchKeyword}%' OR content LIKE '%{$searchKeyword}%'";
    }
    if ($beforeSearch && $searchKeyword) {
        $sql .= " WHERE (title LIKE '%{$beforeSearch}%' OR content LIKE '%{$beforeSearch}%') AND ";
        $sql .= "(title LIKE '%{$searchKeyword}%' OR content LIKE '%{$searchKeyword}%')";
    }
    $result = $dbConnect->query($sql);

    if (!$result) {
        echo "오류";
    } else {
        // 쿼리문의 데이터를 변수 $sortTotalCount 에 대입합니다.
        $boardTotalCount = $result->fetch_array(MYSQLI_ASSOC);
        // 변수 $sortTotalCount 의 레코드 수 정보를 변수 $sortTotalCount 에 다시 대입합니다.
        $boardTotalCount = $boardTotalCount['count(b.'.$sortID.')'];

        // 총 페이지 수
        // 총 페이지 수를 구합니다. 변수 numView 는 183-list.php 의 30라인에 선언되어 있습니다.
        // ceil() 함수는 올림을 하는 함수이며, 변수 newView 의 값인 20으로 페이지를 구성할 때 남는 게시물을 표시하기 위해
        // 반올림이나, 버림 처리를 하지 않고 올림 처리를 합니다.
        $totalPage = ceil($boardTotalCount / $numView);

        echo "<nav class='page navigation'>";
        echo "<ul class='text-center'>";
        // 처음 페이지 이동 링크
        // 처음 페이지로 이동하는 링크입니다.
        // $_GET 방식을 사용하여 page 의 값을 1로 적용합니다.
        echo "<li class='page-item d-inline-block'><a class='page-link' href='./list.php?page=1&sort={$sort}&beforeSearch={$beforeSearch}&searchKeyword={$searchKeyword}'>처음</a></li>";

        // 이전 페이지 이동 링크
        if ($page != 1) {
            $previousPage = $page -1;
            echo "<li class='page-item d-inline-block'><a class='page-link' href='list.php?page={$previousPage}&sort={$sort}&beforeSearch={$beforeSearch}&searchKeyword={$searchKeyword}'>이전</a></li>";
        }

        // 현재 페이지 앞 뒤 페이지 수 표시
        // 현재 페이지를 기준으로 앞 뒤로 5개의 페이지까지 표시합니다.
        // 모든 페이지를 표시하면 가로로 많은 양의 페이지가 표시되는 현상을 방지하기 위함입닏.
        // 예를 들어, 현재 페이작 8페이지이면 페이지를 처음 시작하는 수는 3이됩니다.
        $pageTerm = 5;

        // 처음 표시할 페이지를 현재 페이지를 기준으로 5개 이전까지만 표시
        $startPage = $page - $pageTerm;
        // 음수일 경우 처리
        if ($startPage < 1) {
            $startPage = 1;
        }

        // 마지막 표시할 페이지를 현재 페이지를 기준으로 5개 이후까지만 표시
        $lastPage = $page + $pageTerm;

        // 마지막 페이지의 수보다 클 경우 처리
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

        // 다음 페이지 이동 링크
        if ($page != $totalPage) {
            $nextPage = $page + 1;
            echo "<li class='page-item d-inline-block'><a class='page-link' href='./list.php?page={$nextPage}&sort={$sort}&beforeSearch={$beforeSearch}&searchKeyword={$searchKeyword}'>다음</a></li>";
        }

        // 마지막 페이지 이동 링크
        echo "<li class='page-item d-inline-block'><a class='page-link' href='list.php?page={$totalPage}&sort={$sort}&beforeSearch={$beforeSearch}&searchKeyword={$searchKeyword}'>끝</a></li>";
        echo "</ul>";
        echo "</nav>";
    }


?>

