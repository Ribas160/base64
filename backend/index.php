<?php

require_once 'log.php';

header('Access-Control-Allow-Origin: *');


/**
 * @param array $images
 * @return string
 */
function convert(array $images): string
{
    $base64 = [];
    
    foreach ($images as $image) {
        $error = $encoded = '';

        $info = new SplFileInfo($image['name']);
        $name = trim($info->getFilename());

        if (!$error) $encoded = imgToBase64($image);

        $base64[] = [
            'name' => $name,
            'base64' => $encoded,
            'size' => mb_strlen($encoded),
            'error' => $error,
        ];
    }

    return json_encode($base64);
}


/**
 * @param array $image
 * @return string
 */
function imgToBase64(array $image): string
{
    $imageSize = getimagesize($image['tmp_name']);
    $imageData = base64_encode(file_get_contents($image['tmp_name']));
    if ($image['type'] === 'image/svg+xml') return "data:image/svg+xml;base64,{$imageData}";
    else return "data:{$imageSize['mime']};base64,{$imageData}";
}

logs(print_r($_FILES, true));
echo convert($_FILES);