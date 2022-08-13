<?php
header('Content-Type: application/json; charset=utf-8');
$bot_token = "YOUR_BOT_TOKEN";
$secret = hash_hmac('sha256', $bot_token, 'WebAppData',TRUE);
$get = $_GET;

$init_data_parsed = explode("&", rawurldecode($get['initData']));
$payload = array();

foreach ($init_data_parsed as $value) {
    $data_pair = explode("=", $value);
    if ($data_pair[0] == 'hash')
        $hash = $data_pair[1];
    if ($data_pair[0] !== 'hash') {
        array_push($payload, $data_pair[0] . '=' . $data_pair[1]);
    }
}

sort($payload);

$toSign = implode("\n", $payload);
$signed = bin2hex(hash_hmac('sha256', $toSign, $secret,TRUE));

$valid = $signed == $hash;
echo json_encode(
    ["is_valid" => (int)$valid,
        'sent_data' => $get,
        "signed" => $signed,
        "hash" => $hash,
        "secret" => bin2hex($secret),
        'toSign' => $toSign]
);
