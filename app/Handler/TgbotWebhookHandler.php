<?php

namespace App\Handler;

class TgbotWebhookHandler extends \DefStudio\Telegraph\Handlers\WebhookHandler
{
    public function hi()
    {
        $this->chat->markdown("*Hi* happy to be here!")->send();
    }
}
