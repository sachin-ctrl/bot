<?php

// Include the TelegramBot class
require 'vendor/autoload.php'; // Path to autoload.php file

use Telegram\Bot\Api;

// Set your bot's API token
$token = 'YOUR_BOT_TOKEN';

// Create a new instance of the Telegram API
$telegram = new Api($token);

// Retrieve incoming updates and process them
$update = $telegram->getWebhookUpdate();

// Check if the update contains a message
if (isset($update["message"])) {
    // Get the chat ID and message text
    $chat_id = $update["message"]["chat"]["id"];
    $message_text = $update["message"]["text"];

    // Process the message
    switch ($message_text) {
        case '/start':
            $response = "Hello! Welcome to your Telegram bot.";
            break;
        case '/hello':
            $response = "Hi there! How can I help you?";
            break;
        default:
            $response = "Sorry, I don't understand that command.";
    }

    // Send the response
    $telegram->sendMessage(['chat_id' => $chat_id, 'text' => $response]);
}
