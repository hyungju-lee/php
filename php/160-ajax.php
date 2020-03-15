<!doctype html>
<html>
<head>
    <script>
        var xhttp = new XMLHttpRequest();
        xhttp.onreadystatechange = function () {
            if (this.readyState == 4 && this.status == 200) {
                console.log(this.responseText);
                var data = JSON.parse(this.responseText);
                console.log(data.student);
            }
        };
        xhttp.open("POST", "http://localhost/php/157-1.json", true);
        xhttp.send();
    </script>
</head>
<body>

</body>
</html>