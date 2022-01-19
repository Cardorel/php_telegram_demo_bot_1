<?php

namespace Longman\TelegramBot\Commands\UserCommands;

use Longman\TelegramBot\Commands\Entities;
use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Entities\Message;
use Longman\TelegramBot\Request;

class DataCommand extends UserCommand
{
    protected $name = 'data';                      // Your command's name
    protected $description = 'A command for test'; // Your command description
    protected $usage = '/data';                    // Usage of your command
    protected $version = '1.0.0';                  // Version of your command
    public function execute()
    {
        /** @var Message $message */
        $message = $this->getMessage();            // Get Message object
        $chat_id = $message->getChat()->getId();   // Get the current Chat ID
        $text = date('Y/m/d');
        $data = [                                  // Set up the new message data
            'chat_id' => $chat_id,                 // Set Chat ID to send the message to
            'text'    => $text, // Set message to send
        ];
        return Request::sendMessage($data);        // Send message!
    }
}