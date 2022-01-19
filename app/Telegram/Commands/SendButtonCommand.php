<?php
namespace Longman\TelegramBot\Commands\UserCommands;

use Longman\TelegramBot\Commands\Entities;
use Longman\TelegramBot\Commands\UserCommand;
use Longman\TelegramBot\Entities\Message;
use Longman\TelegramBot\Request;
use Longman\TelegramBot\Entities\InlineKeyboardMarkup;
use Longman\TelegramBot\Entities\InlineKeyboardButton;

class SendButtonCommand extends UserCommand
{
    protected $name = 'sendbutton';                      // Your command's name
    protected $description = 'A command for test'; // Your command description
    protected $usage = '/sendbutton';                    // Usage of your command
    protected $version = '1.0.0';                  // Version of your command

    public function execute()
    {
        /** @var Message $message */
        $message = $this->getMessage();            // Get Message object

        $chat_id = $message->getChat()->getId();   // Get the current Chat ID

        $inline_keyboard = [
                  new InlineKeyboardButton(['text' => 'inline', 'switch_inline_query' => 'true']),
                  new InlineKeyboardButton(['text' => 'callback', 'callback_data' => 'identifier']),
                  new InlineKeyboardButton(['text' => 'go to mystat', 'url' => 'https://mystat.itstep.org/en/auth/login/index?returnUrl=%2Fen%2Fmain%2Fnews%2Fpage%2Findex']),
];


      $data = [                                  // Set up the new message data
            'chat_id' => $chat_id,                 // Set Chat ID to send the message to
            'text'    => 'Click here',
            'reply_markup' => new InlineKeyboardMarkup(['inline_keyboard' => [$inline_keyboard]]),
        ];

        return Request::sendMessage($data);        // Send message!
    }
}