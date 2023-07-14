<?php

namespace App\Http\Controllers;

use App\Conversations\OptionsConversation;
use BotMan\BotMan\BotMan;
use Illuminate\Http\Request;

class TodosController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('Halo|Hai|Hi', function ($bot) {
            $bot->reply('Halo!');
            $this->startConversation($bot);
        });

        $botman->hears('Pagi|Selamat Pagi', function ($bot) {
            $bot->reply('Pagi');
            $this->startConversation($bot);
        });

        $botman->hears('Siang|Selamat Siang', function ($bot) {
            $bot->reply('Siang');
            $this->startConversation($bot);
        });

        $botman->hears('Sore|Selamat Sore', function ($bot) {
            $bot->reply('Sore');
            $this->startConversation($bot);
        });

        $botman->hears('Malam|Selamat Malam', function ($bot) {
            $bot->reply('Malam');
            $this->startConversation($bot);
        });

        $botman->hears("Assalamu'alaikum|Assalamualaikum", function ($bot) {
            $bot->reply("Wa'alaikumsalam");
            $this->startConversation($bot);
        });

        $botman->listen();
    }

    /**
     * Start Conversation.
     *
     * @param Botman $bot
     * @return void
     */
    public function startConversation(BotMan $bot)
    {
        $bot->startConversation(new OptionsConversation());
    }
}
