<?php
    include './common/session.php';
    include './common/checkSignSession.php';
    include './connection/connection.php';
?>
<!DOCTYPE HTML>
<html lang="ko-KR">
<?php
    $title = '메인페이지';
    $root = '.';
    include "include/head.php";
?>
<body>
<div id="wrap">
    <?php
        include "include/header.php";
    ?>
    <div id="container">
        <div id="contents">
        <?php
            if (!isset($_SESSION['memberID'])) {
        ?>
            <a href="signUp/173-signUpForm.php">회원가입</a>
            <br>
            <a href="signIn/175-signInForm.php">로그인</a>
        <?php
            } else {
                if (isset($_GET['page'])) {
                    $page = (int) $_GET['page'];
                } else {
                    $page = 1;
                }


            }
        ?>
            <h2 class="list_h2">subject</h2>
            <ul class="page_list">
                <li class="page_list_item"><a class="page_link" href="06_simple/index.html">입문자를 위한 정말 간단한 코딩 지식(필수)</a></li>
                <li class="page_list_item"><a class="page_link" href="00_issue/index.html">weekly issue</a></li>
                <li class="page_list_item"><a class="page_link" href="01_study/index.html">study</a></li>
                <!--                <li class="page_list_item"><a class="page_link" href="02_project/index.html">...</a></li>-->
                <!--                <li class="page_list_item"><a class="page_link" href="03_maintenance/index.html">...</a></li>-->
                <li class="page_list_item"><a class="page_link" href="05_technique/index.html">technique</a></li>
            </ul>
            <h2 class="list_h2">Tool</h2>
            <ul class="page_list">
                <li class="page_list_item"><a class="page_link" href="04_tool/index.html">training tool</a></li>

            </ul>

            <h2 class="list_h2">Url</h2>
            <ul class="page_list">
                <li class="page_list_item"><a class="page_link" href="https://neumorphism.io/">https://neumorphism.io/</a></li>
                <li class="page_list_item"><a class="page_link" href="https://interactjs.io/">https://interactjs.io/</a></li>
            </ul>

            <h2 class="list_h2">Study</h2>
            <ul class="page_list">
                <li class="page_list_item"><a class="page_link" href="07_company/index.html">NodeJS 스터디</a></li>

            </ul>
        </div>
    </div>
    <?php
        include "include/footer.php";
    ?>
</div>
<?php
    $root = '.';
    include "include/script.php";
?>
</body>
</html>