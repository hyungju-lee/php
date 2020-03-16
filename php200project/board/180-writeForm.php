<?php
    // 게시글의 내용을 입력하는 폼을 생성하겠습니다.
    // 게시글의 입력폼은 게시글의 제목과 내용을 입력하는 폼으로 구성됩니다.

    // 로그인하지 않은 상태에서 180-writeForm.php 페이지에 진입 시
    // 메인 페이지로 이동하는 기능이 작동하기 위해 session_start() 함수가 있는
    // 171-session.php 파일을 include 합니다.
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/common/171-session.php';
    // 로그인을 하지 않은 상태에서 메인페이지로 이동하는 기능을 하는 파일인 179-checkSignSession.php 파일을 include 합니다.
    include $_SERVER['DOCUMENT_ROOT'].'/php200project/common/179-checkSignSession.php';
?>

<!doctype html>
<html lang="ko">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>게시판글작성</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <link href="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js" integrity="sha384-wfSDF2E50Y2D1uUdj0O3uMBJnjuUD4Ih7YwaYd1iqfktj0Uod8GCExl3Og8ifwB6" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/summernote@0.8.16/dist/summernote-bs4.min.js"></script>
    <!-- include summernote-ko-KR -->
    <script src="../lang/summernote-ko-KR.js"></script>
</head>
<body>
    <form name="boardWrite" method="post" action="181-saveBoard.php">
        제목
        <br><br>
        <input type="text" name="title" required>
        <br><br>
        내용
        <br><br>
        <textarea name="content" id="summernote" required></textarea>
        <br><br>
        <input type="submit" value="저장">
    </form>
    <script>
        $(document).ready(function() {
            $('#summernote').summernote({
                placeholder: 'Hello Bootstrap 4',
                tabsize: 2,
                lang: 'ko-KR', // default: 'en-US'
                height: 300,
                toolbar: [
                    // [groupName, [list of button]]
                    ['style', ['bold', 'italic', 'underline', 'clear']],
                    ['font', ['strikethrough', 'superscript', 'subscript']],
                    ['fontname', ['fontname']],
                    ['fontsize', ['fontsize']],
                    ['color', ['color']],
                    ['para', ['ul', 'ol', 'paragraph']],
                    ['table', ['table']],
                    ['insert', ['link', 'picture', 'video']],
                    ['view', ['fullscreen', 'codeview', 'help']],
                    ['height', ['height']]
                ],
                popover: {
                    image: [
                        ['image', ['resizeFull', 'resizeHalf', 'resizeQuarter', 'resizeNone']],
                        ['float', ['floatLeft', 'floatRight', 'floatNone']],
                        ['remove', ['removeMedia']]
                    ],
                    link: [
                        ['link', ['linkDialogShow', 'unlink']]
                    ],
                    table: [
                        ['add', ['addRowDown', 'addRowUp', 'addColLeft', 'addColRight']],
                        ['delete', ['deleteRow', 'deleteCol', 'deleteTable']],
                    ],
                    air: [
                        ['color', ['color']],
                        ['font', ['bold', 'underline', 'clear']],
                        ['para', ['ul', 'paragraph']],
                        ['table', ['table']],
                        ['insert', ['link', 'picture']]
                    ]
                },
                blockquoteBreakingLevel: 2,
                fontSizeUnits: ['px', 'pt'],
                dialogsFade: true,  // Add fade effect on dialogs
                tabDisable: false,
                codeviewFilter: false,
                codeviewIframeFilter: true,
                spellCheck: true
            });
        });
    </script>
</body>
</html>
