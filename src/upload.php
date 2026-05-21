<?php


function upload() {
    $target_dir = "/assets/media/uploads";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
}

