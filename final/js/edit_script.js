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
            onMediaDelete: function (target) {
                deleteImage(target[0].src);
                // remove element in editor
                target.remove();
            },
            onKeyup: function (e) {
                // 이미지 여러개일때 고려
                // https://github.com/summernote/summernote-rails/blob/master/example/app/assets/javascripts/summernote-init.coffee
                // 이전 innerHTML과 백스페이스 or del 키 눌렀을 때 innerHTML과 비교해서 해야되는 거같은데..
                var oldValue = e.target.innerHTML;
                if (e.keyCode == 8 || e.keyCode == 46) {
                    var newValue = e.target.innerHTML;

                    console.log(newValue)
                    if (newValue.match(/<img\s(?:.+?)>/g)) {
                        console.log('진짜지울꺼야?')
                    }
                }
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

    function deleteImage(src) {
        var imgSrc = src;
        var data = new FormData();
        data.append("imgSrc", imgSrc);
        $.ajax({
            data: data,
            type: "POST",
            url: "./fileDelete.php",
            cache: false,
            contentType: false,
            processData: false,
            success: function (data) {
                console.log(data);
            }
        });
    }
});