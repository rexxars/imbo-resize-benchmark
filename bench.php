<?php
require __DIR__ . '/vendor/autoload.php';

$config = require __DIR__ . '/config/config.php';

use ImboClient\ImboClient;
use ImboClient\ImagesQuery;

$client = ImboClient::factory($config);

$query = (new ImagesQuery())->limit($config['numImages']);
$response = $client->getImages($query);
$bytes = [];

$start = time();
$i = 0;
for ($x = 0; $x < $config['iterations']; $x++) {
    foreach ($response['images'] as $image) {
        $url = $client->getImageUrl($image['imageIdentifier'])
            ->{$config['transformation']}($config['size'][0], $config['size'][1])
            ->convert($config['format']);

        $bytes[] = strlen($client->getImageDataFromUrl($url));

        echo '.';
        if (++$i === 50) {
            $i = 0;
            echo PHP_EOL;
        }
    }
}

echo PHP_EOL;
echo 'Resized ' . count($bytes) . ' images in ' . (time() - $start) . 's' . PHP_EOL;

