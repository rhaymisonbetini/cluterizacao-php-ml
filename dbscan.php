<?php

require_once __DIR__ . '/vendor/autoload.php';

use Phpml\Clustering\DBSCAN;

function scan()
{

    $dbScan = new DBSCAN(3);

    $samples = [[1, 2], [7, 9], [2, 1], [8, 7], [1, 1], [9, 8], [5, 4], [9, 8], [10, 20], [15, 36], [10, 25]];

    $clustering = $dbScan->cluster($samples);

    $grouped = array();
    $i = 0;

    foreach ($clustering as $clusters) {
        $grouped[$i] = "grupo" . ($i + 1) . ":";
        foreach ($clusters as $elements) {
            $grouped[$i] .= "[" . $elements[0] . ' , ' . $elements[1] . "]";
        }
        $i++;
    }

    return $grouped;
}

$grouped = scan();

foreach ($grouped as $grup) {
    echo $grup . "\n";
}
