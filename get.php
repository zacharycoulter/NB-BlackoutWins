<?php echo (int)file_get_contents('./wins.txt');

if(isset($_SERVER['HTTP_NIGHTBOT_CHANNEL'])) {
    parse_str($_SERVER['HTTP_NIGHTBOT_CHANNEL'], $nightbotChannel);
    echo (int)file_get_contents("wins-" . $nightbotChannel["name"] + ".txt");
    return;
}else{
    echo "Nightbot channel header not set";
}