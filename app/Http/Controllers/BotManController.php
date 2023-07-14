<?php

namespace App\Http\Controllers;

use BotMan\BotMan\BotMan;
use BotMan\BotMan\Messages\Incoming\Answer;
use Illuminate\Http\Request;

class BotManController extends Controller
{
    /**
     * Place your BotMan logic here.
     */
    public function handle()
    {
        $botman = app('botman');

        $botman->hears('{message}', function($botman, $message) {
            if ($message == 'hai') {
                $this->askName($botman);
            }
            else{
                $botman->reply("Tulis kata 'hai' untuk testing...");
            }
        });

        $botman->listen();
    }

    /**
     * Place your BotMan logic here.
     */
    public function askName($botman)
    {
        $botman->ask('Halo! Siapa nama anda?', function(Answer $answer) {
            $name = $answer->getText();
            $this->say('Senang bertemu dengan anda, '.$name);
        });
    }
}
