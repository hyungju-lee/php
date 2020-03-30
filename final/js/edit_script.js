$(document).ready(function() {
    $('.summernote').summernote({
        placeholder: '텍스트를 입력하세요.',
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
            ['height', ['height']],
            ['insert', ['gxcode']]
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
        tabDisable: true,
        codeviewFilter: false,
        codeviewIframeFilter: true,
        spellCheck: true,
        callbacks: {
            onImageUpload: function (image) {
                uploadImage(image[0]);
            },
            //https://summernote.org/deep-dive/#insertnode
            onMediaDelete: function (target) {
                deleteFile(target[0].src);
            }
        }
    });

    function uploadImage(image) {
        var data = new FormData();
        data.append("image", image);
        $.ajax({
            url: './fileUpload.php',
            cache: false,
            contentType: false,
            processData: false,
            data: data,
            type: "post",
            dataType: "JSON",
            success: function(data) {
                var image = $('<img>').attr('src', data.src);
                $('.summernote').summernote("insertNode", image[0]);
            },
            error: function(data) {
                console.log(data);
            }
        });
    }

    function deleteFile(src) {
        $.ajax({
            data: {src : src},
            type: "POST",
            url: './fileDelete.php',
            cache: false,
            success: function(resp) {
                console.log(resp);
            }
        });
    }
});