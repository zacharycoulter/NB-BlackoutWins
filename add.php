<?php
if (isset($_SERVER["HTTP_NIGHTBOT_USER"]) && isset($_SERVER['HTTP_NIGHTBOT_CHANNEL'])) {
    parse_str($_SERVER['HTTP_NIGHTBOT_USER'], $nightbotUser);
    parse_str($_SERVER['HTTP_NIGHTBOT_CHANNEL'], $nightbotChannel);

    if ($nightbotUser['userLevel'] == "moderator" || $nightbotUser['userLevel'] == "owner") {
        $wins = 0;

        if (file_exists("wins-" . $nightbotChannel["name"] + ".txt")) {
            $wins = (int)file_get_contents("wins-" . $nightbotChannel["name"] + ".txt");
        }

        $wins++;

        echo $wins;
        file_put_contents("wins-" . $nightbotChannel["name"] + ".txt", $wins);
        return;
    }
}

header('HTTP/1.0 403 Forbidden');
die('You are not allowed to access this file.');
