<?php

require_once __DIR__ . '/vendor/autoload.php';

use Phpml\Clustering\KMeans;

function cluster($group)
{

    $kmeans = new KMeans($group, $group - 1);

    $samples = [[1, 2], [7, 9], [2, 1], [8, 7], [1, 1], [9, 8], [15, 20], [25, 30]];

    clusterReturn:
    $clustering = $kmeans->cluster($samples);

    $grouped = array();
    $i = 0;

    if (count($clustering) == $group) {
        foreach ($clustering as $clusters) {
            $grouped[$i] = "grupo" . ($i + 1) . ":";
            foreach ($clusters as $elements) {
                $grouped[$i] .= "[" . $elements[0] . ' , ' . $elements[1] . "]";
            }
            $i++;
        }
    } else goto clusterReturn;

    return $grouped;
}


$grouped = cluster(3);

foreach ($grouped as $grup) {
    echo $grup . "\n";
}
