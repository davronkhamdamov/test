<?php
$token = "Sizning_Telegram_tokeningiz";

$botUsername = "Sizning_bot_usernameingiz";

$botAPI = "https://api.telegram.org/bot".$token."/";

$update = file_get_contents("php://input");
$update = json_decode($update, true);

$chatId = $update['message']['chat']['id'];
$message = $update['message']['text'];

if ($message === "/start") {
    sendMessage("Salom! Botimizga xush kelibsiz!", $chatId);
} elseif ($message === "/buyurtma") {
    sendMessage("Buyurtmangizni qabul qildim!", $chatId);
} else {
    sendMessage("Uzr, nimadir noto'g'ri ketdi.", $chatId);
}

function sendMessage($text, $chatId) {
    $url = $GLOBALS['botAPI']."sendMessage?text=".urlencode($text)."&chat_id=".$chatId;
    file_get_contents($url);
}
?>
