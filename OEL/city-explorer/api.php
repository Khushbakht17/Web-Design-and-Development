<?php
header('Content-Type: application/json; charset=utf-8');
$OPEN_CAGE_KEY = 'ae32604ef55b442681717d86dc5fef4f';
if (!isset($_GET['city'])) { echo json_encode(['error'=>'Missing city']); exit; }
$city = urlencode($_GET['city']);
$url = "https://api.opencagedata.com/geocode/v1/json?q={$city}&key={$OPEN_CAGE_KEY}&no_annotations=0&limit=5";
$ch = curl_init($url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
$response = curl_exec($ch);
curl_close($ch);
echo $response;
?>