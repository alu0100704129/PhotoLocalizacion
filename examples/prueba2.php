<?php
require "./prueba.php";
 
$lat = floatval($_GET["lat"]);
$lng = floatval($_GET["lng"]);
 
$geo = new Geonames("username");
$prompt = "Find cinema listings near you";
try {
    $place = $geo->getPlaceName($lat, $lng);
    if ($place != "Unknown") {
        $prompt .= " in " . $place;
    }
}
catch (Exception $e) {
    error_log("Error with web service: " . $e->getMessage());
}
header("Content-Type: text/plain");
echo $prompt;
<?