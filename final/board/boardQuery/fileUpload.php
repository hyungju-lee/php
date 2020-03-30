<?php
header("Content-Type: application/json");
$result = array();
$image = empty($_FILES['image'])? '' : $_FILES['image']['tmp_name'];

if (!empty($image)) {
    $fileNameArray = explode('.', $_FILES['image']['name']);
    $fileTypeExtension = explode("/", $_FILES['image']['type']);
    $fileType = $fileTypeExtension[0];
    $extension = $fileTypeExtension[1];
    $fileName = $fileNameArray[0];
    $isExtGood = false;

    switch ($extension) {
        case 'jpeg':
        case 'bmp':
        case 'gif':
        case 'png':
            $isExtGood = true;
            break;
        default :
            echo "허용하는 확장자는 jpg, bmp, gif, png 입니다. - switch";
            exit;
            break;
    }

    if ($fileType == 'image') {
        if ($isExtGood) {
            $myFile = "./assets/img/{$fileName}.{$extension}";
            $imageUpload = move_uploaded_file($image, $myFile);
            $result = array(
              'src' => $myFile
            );
        }
    }

    echo json_encode($result);
}
?>