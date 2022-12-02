<?php

namespace App\Handler;

use DefStudio\Telegraph\Enums\ChatActions;
use DefStudio\Telegraph\Facades\Telegraph;
use DefStudio\Telegraph\Handlers\WebhookHandler;
use DefStudio\Telegraph\Keyboard\Button;
use DefStudio\Telegraph\Keyboard\Keyboard;
use DefStudio\Telegraph\Keyboard\ReplyButton;
use DefStudio\Telegraph\Keyboard\ReplyKeyboard;
use DefStudio\Telegraph\Models\TelegraphBot;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Stringable;

class TgbotWebhookHandler extends WebhookHandler
{

    public function setting(){
        $this->chat->message('hello world')
            ->keyboard(Keyboard::make()->buttons([
                Button::make('Delete')->action('delete')->param('id', '42'),
                Button::make('open')->url('https://test.it'),
                Button::make('Web App')->webApp('https://web-app.test.it'),
            ]))->send();
    }

    public function addCommand(){
        //...

        $this->bot->registerCommands([
            'setting' => 'command 1111 description',
            'addCommand' => 'command 2222 description'
        ])->send();
        $this->chat->markdown("设置成功")->send();
    }

    public function addbot(){
        $bot = TelegraphBot::create([
            'token' => '5803298657:AAGkCGQkEc17IJEP4ms6G8LHex2GLlP3ogc',
            'name' => '非人类',
        ]);
        $bot->registerWebhook()->send();
    }

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
