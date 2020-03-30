<?php
    $src = $this->input->post('src'); // $src = $_POST['src'];
    $file_name = str_replace(base_url(), '', $src); // striping host to get relative path
    if(unlink($file_name))
    {
        echo 'File Delete Successfully';
    }
?>