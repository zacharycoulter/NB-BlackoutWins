<?php
if (isset($_SERVER["HTTP_NIGHTBOT_USER"]) && isset($_SERVER['HTTP_NIGHTBOT_CHANNEL'])) {
    parse_str($_SERVER['HTTP_NIGHTBOT_USER'], $nightbotUser);
    parse_str($_SERVER['HTTP_NIGHTBOT_CHANNEL'], $nightbotChannel);

    if ($nightbotUser['userLevel'] == "moderator" || $nightbotUser['userLevel'] == "owner") {
        $allWins = json_decode(file_get_contents("wins.json"), true);

        if(array_key_exists($nightbotChannel['name'], $allWins)) {
            $allWins[$nightbotChannel['name']]++;
        }else{
            $allWins[$nightbotChannel['name']] = 1;
        }

        echo $allWins[$nightbotChannel['name']];
        file_put_contents("wins.json", json_encode($allWins));
        return;
    }
}

header('HTTP/1.0 403 Forbidden');
die('You are not allowed to access this file.');
