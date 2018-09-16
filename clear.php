<?php
if (isset($_SERVER["HTTP_NIGHTBOT_USER"])) {
    parse_str($_SERVER['HTTP_NIGHTBOT_USER'], $nightbotHeader);

    if ($nightbotHeader['userLevel'] == "moderator" || $nightbotHeader['userLevel'] == "owner") {
        echo "0";
        file_put_contents('./wins.txt', "0");
        return;
    }
}

header('HTTP/1.0 403 Forbidden');
die('You are not allowed to access this file.');