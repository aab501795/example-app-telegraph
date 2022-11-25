<?php

namespace App\Handler;

use DefStudio\Telegraph\Enums\ChatActions;
use DefStudio\Telegraph\Facades\Telegraph;
use DefStudio\Telegraph\Keyboard\ReplyButton;
use DefStudio\Telegraph\Keyboard\ReplyKeyboard;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Stringable;

class TgbotWebhookHandler extends \DefStudio\Telegraph\Handlers\WebhookHandler
{
    public function start()
    {
        Log::debug('WebhookHandler-start-'.time());
        $this->chat->markdown("*Hello* 欢迎使用!")->send();
    }

    public function hi()
    {
        Log::debug('WebhookHandler-hi-'.time());
        $this->chat->markdown("*Hi* happy to be here!")->send();
    }

    protected function handleChatMessage(Stringable $text): void
    {
        Log::debug('WebhookHandler-handleChatMessage-'.time());
        //in this example, a received message is sent back to the chat
        $this->chat->html("Received: $text")->send();
    }
}
