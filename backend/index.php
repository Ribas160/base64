<?php

require_once 'log.php';

header('Access-Control-Allow-Origin: *');

class App 
{


    /**
     * @param array $images
     * @return string
     */
    public static function convert(array $images): string
    {
        $base64 = [];
        
        foreach ($images as $image) {
            $error = $encoded = '';

            if (strpos(self::getSize($image['size']), 'MB')) $error = 'File is too big. Max. 1 MB per file.';

            $info = new SplFileInfo($image['name']);
            $name = trim($info->getFilename());

            if (strlen($name) > 6) $name = mb_substr($name, 0, 5) . '... ' . $info->getExtension();
            else $name = $image['name'];

            if (!$error) $encoded = self::imgToBase64($image);

            $base64[] = [
                'id' => bin2hex(random_bytes(15)),
                'name' => $name,
                'base64' => $encoded,
                'size' => self::getSize(mb_strlen($encoded)),
                'error' => $error,
            ];
        }

        return json_encode($base64);
    }


    /**
     * @param array $image
     * @return string
     */
    private static function imgToBase64(array $image): string
    {
        $imageSize = getimagesize($image['tmp_name']);
        $imageData = base64_encode(file_get_contents($image['tmp_name']));
        if ($image['type'] === 'image/svg+xml') return "data:image/svg+xml;base64,{$imageData}";
        else return "data:{$imageSize['mime']};base64,{$imageData}";
    }


    /**
     * @param int $bytes
     * @return string
     */
    private static function getSize(int $bytes): string
    {
        if ( $bytes < 1000 * 1024 ) return number_format( $bytes / 1024, 2 ) . " KB";
        elseif ( $bytes < 1000 * 1048576 ) return number_format( $bytes / 1048576, 2 ) . " MB";
        elseif ( $bytes < 1000 * 1073741824 ) return number_format( $bytes / 1073741824, 2 ) . " GB";
        else return number_format( $bytes / 1099511627776, 2 ) . " TB";
    }
}

echo App::convert($_FILES);