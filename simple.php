<?php

require_once __DIR__ . '/vendor/autoload.php';

use Phpml\Clustering\KMeans;

$kmeans = new KMeans(2);

$samples = [[1, 2], [7, 9], [2, 1], [8, 7], [1, 1], [9, 8]];

$clustering = $kmeans->cluster($samples);

$grouped = array();
$i = 0;

foreach ($clustering as $clusters) {
    $grouped[$i] = "grupo" . ($i + 1) . ":";
    foreach ($clusters as $elements) {
        $grouped[$i] .= "[" . $elements[0] . ' , ' . $elements[1] . "]";
    }
    $i++;
}

foreach ($grouped as $grup) {
    echo $grup . "\n";
}
