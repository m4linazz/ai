<?php
// ai_proxy.php
header('Content-Type: application/json');

$apiKey = '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';
$raw = file_get_contents('php://input');
$data = json_decode($raw, true);

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, 'https://openrouter.ai/api/v1/chat/completions');
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_HTTPHEADER, [
    "Authorization: Bearer $apiKey",
    "Content-Type: application/json"
]);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data));

$response = curl_exec($ch);
curl_close($ch);

echo $response;
