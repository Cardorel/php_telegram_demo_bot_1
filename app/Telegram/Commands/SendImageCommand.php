<?php

namespace Longman\TelegramBot\Commands\UserCommands;

use Longman\TelegramBot\Commands\Entities;
use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Entities\Message;
use Longman\TelegramBot\Request;

class SendImageCommand extends UserCommand 
{
    protected $name = 'sendimage';
    protected $description = 'A command for test'; 
    protected $usage = '/sendimage';                  
    protected $version = '1.0.0';

     public function execute()
    {
        
        /** @var Message $message */             
        $message = $this->getMessage(); 
        
        $chat_id = $message->getChat()->getId(); 
        $photo = 'https://picsum.photos/200/300';
        $data = [                                 
            'chat_id' => $chat_id,               
            'photo'    => $photo, 
        ];

        return Request::sendPhoto($data);        // Send message!
    }
}