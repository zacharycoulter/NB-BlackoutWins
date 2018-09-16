<?php echo (int)file_get_contents('wins.json');

if(isset($_SERVER['HTTP_NIGHTBOT_CHANNEL'])) {
    parse_str($_SERVER['HTTP_NIGHTBOT_CHANNEL'], $nightbotChannel);

    $allWins = json_decode(file_get_contents("wins.json"), true);
    echo $allWins[$nightbotChannel['name']];
    return;
}else{
    echo "Nightbot channel header not set";
}