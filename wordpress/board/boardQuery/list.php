<?php
    /*
     * 게시물 목록 페이지 생성하기
     * 임의로 게시물을 생성했습니다.
     * 이 게시물의 목록을 보는 페이지를 생성하겠습니다.
     * 게시물 목록 페이지는 모든 게시물을 불러오지 않고 등록된 시간을 기준으로 최신순으로 20개만 표시하게 생성합니다.
     * 또한 게시물은 table 태그를 사용하여 목록을 출력합니다.
     * */

    date_default_timezone_set('Asia/Seoul');
    // 171-session.php 파일을 include 합니다.
    include '../../common/session.php';
    // 비로그인 시에 접근할 수 없도록 179-checkSignSession.php 파일을 include 합니다.
    include '../../common/checkSignSession.php';
    // member 테이블과 $sort 테이블의 데이터를 가져오므로 163-connection.php 파일을 include 합니다.
    include '../../connection/connection.php';

    $sort = $_GET['sort'];
    $sortID = $sort.'ID';
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
    $root = '../..';
    include "../../include/header.php";
    ?>
    <div class="container">
        <div class="contents">
            <div class="btn-area text-right">
                <a class="btn btn-dark" href="../../index.php">메인페이지가기</a>
                <a class="btn btn-dark d-inline-block" href="../../signIn/signOut.php">로그아웃</a>
            </div>
            <div class="btn-area mb-4">
                <?php
                echo "<a class='btn btn-dark align-top' href='writeForm.php?sort={$sort}'>글작성하기</a>";
                include 'searchForm.php';
                ?>
            </div>
            <?php
            echo "<h2 class='list_h2'>{$sort} 게시판</h2>";
            ?>

                <?php
                    // 게시물 목록 페이지에는 한 페이지에 20개의 게시물 데이터를 출력합니다.
                    // 그러므로 책의 쪽수 정보를 $_GET 방식으로 데이터를 전달합니다.
                    // $_GET['page'] 가 없다면 쪽수가 1임을 의미합니다.
                    if (isset($_GET['page'])) {
                        $page = (int) $_GET['page'];
                    } else {
                        $page = 1;
                    }

                    // 한번에 출력할 게시물의 수는 20이며 이 값을 변수 $numView 에 대입합니다.
                    $numView = 20;
                    // 변수 $firstLimitValue 는 쿼리문 LIMIT 문의 첫 번째 값으로 사용됩니다.
                    // 쪽수의 값에 따라 불러오는 데이터를 정하는 공식입니다.
                    // 쪽수에 따른 LIMIT 문의 첫 번째 값의 변화는 다음과 같습니다.
                    $firstLimitValue = ($numView * $page) - $numView;

                    // 게시글의 데이터를 불러오는 쿼리문입니다.
                    // 작성자 정보를 함께 표시하지만 $sort 테이블에는 작성자 정보가 없기 때문에 member 테이블과 함께 memberID 정보를 매칭하여
                    // 작성자 정보를 함께 불러옵니다.
                    $sql = "SELECT b.{$sortID}, b.title, m.nickname, b.regTime FROM {$sort} b ";
                    $sql .= "JOIN member m ON (b.memberID = m.memberID) ORDER BY {$sortID} ";
                    $sql .= "DESC LIMIT {$firstLimitValue}, {$numView}";
                    $result = $dbConnect->query($sql);

//                SELECT DISTINCT memberID FROM `jqueryplugin`

                    // 불러온 데이터의 수만큼 table 태그의 tr 태그와 td 태그를 출력합니다.
                    if ($result) {
                        $dataCount = $result->num_rows;

                        if ($dataCount > 0) {
                            echo "<ul class='page_list'>";
                            for ($i=0; $i<$dataCount; $i++) {
                                $memberInfo = $result->fetch_array(MYSQLI_ASSOC);
                                echo "<li class='page_list_item'>";
                                echo "<a class='page_link d-flex justify-content-between' href='/wordpress/board/boardQuery/view.php?boardID={$memberInfo[$sortID]}&sort={$sort}'>";
                                echo "<span><em class='em mr-4'>[title ".$memberInfo[$sortID]."]</em> "."[".$memberInfo['title']."]</span>";
                                echo "<strong><span class='mr-2'>[".$memberInfo['nickname']."]</span> [".date('Y-m-d H:i', $memberInfo['regTime'])."]</strong>";
                                echo "</a>";
                                echo "</li>";

//                                echo "<tr>";
//                                echo "<td scope='row'>".$memberInfo[$sortID]."</td>";
                                // 제목을 누르면 해당 게시물의 내용을 볼 수 있는 페이지로 이동해야 하므로
                                // a 링크를 사용하여 주소를 지정합니다.
                                // $sortID 의 값을 GET 방식으로 전송함을 알 수 있습니다.
//                                echo "<td><a href='/wordpress/board/boardQuery/view.php?boardID=";
//                                echo "{$memberInfo[$sortID]}&sort={$sort}'>";
//                                echo $memberInfo['title'];
//                                echo "</a></td>";
//                                echo "<td>{$memberInfo['nickname']}</td>";
                                // $sort 테이블에는 게시글을 작성한 시간이 타임스탬프로 되어 있으므로 이 값을 보기 쉽게
                                // yyyy-mm-dd hh:mm:ss 형태로 변환합니다.
//                                echo "<td>".date('Y-m-d H:i', $memberInfo['regTime'])."</td>";
//                                echo "</tr>";
                            }
                            echo "</ul>";
                        } else {
                            echo "<p class='note'>게시글이 없습니다.</p>";
                        }
                    }
                ?>


            <?php
                // 다음 페이지로 이동하는 링크가 있는 파일을 include 합니다.
                // 검색 기능이 있는 파일을 include 합니다.
                include 'nextPageLink.php';
            ?>
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
