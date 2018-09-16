<?php
if(isset($_SERVER['HTTP_NIGHTBOT_CHANNEL'])) {
    parse_str($_SERVER['HTTP_NIGHTBOT_CHANNEL'], $nightbotChannel);

    $allWins = json_decode(file_get_contents("wins.json"), true);
    if(!array_key_exists($nightbotChannel['name'], $allWins)) {
        echo 0;
        return;
    }

    echo $allWins[$nightbotChannel['name']];
    return;
}else{
    echo "Nightbot channel header not set";
    return;
}