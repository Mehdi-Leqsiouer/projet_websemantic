<?php

function getPath($lat1,$lon1,$lat2,$lon2,$mode) {
    $ch = curl_init();
    curl_setopt($ch, CURLOPT_URL, "https://api.openrouteservice.org/v2/directions/$mode?api_key=5b3ce3597851110001cf6248fcb19b493ccf435791d6dac5ee251b1c&start=$lon1,$lat1&end=$lon2,$lat2");
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, TRUE);
    curl_setopt($ch, CURLOPT_HEADER, FALSE);

    curl_setopt($ch, CURLOPT_HTTPHEADER, array(
        "Accept: application/json, application/geo+json, application/gpx+xml, img/png; charset=utf-8"
    ));

    $response = curl_exec($ch);
    curl_close($ch);

    //var_dump($response);
    return $response;
}


if (isset($_GET['depart_lat']) && isset($_GET['depart_long'])&& isset($_GET['arriver_lat']) && isset($_GET['arriver_long'])) {

    $depart_lat = $_GET['depart_lat'];
    $depart_long = $_GET['depart_long'];

    $arriver_lat = $_GET['arriver_lat'];
    $arriver_long = $_GET['arriver_long'];


    $path = getPath($depart_lat,$depart_long,$arriver_lat,$arriver_long,"cycling-road");

    $fp = fopen("path.geojson","w");
    fwrite($fp,$path);
    fclose($fp);


    $retour = array();
    $retour['success'] = true;
    echo json_encode($retour);
}
?>