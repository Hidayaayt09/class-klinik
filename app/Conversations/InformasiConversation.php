<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;

class InformasiConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function run()
    {
        $question = Question::create("Pilih Jadwal Buka Klinik/Jadwal Dokter")
                            ->fallback('Can not fetch all todos')
                            ->callbackId('ask_all_todos')
                            ->addButtons([
                                Button::create("Jadwal Buka Klinik")->value("jadwal_buka")->name('handle_todo'),
                                Button::create("Jadwal Dokter")->value("jadwal_dokter")->name('handle_todo')
                            ]);

        $this->ask($question, function(Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                if ($answer->getValue() == 'jadwal_buka') {
                    $this->bot->reply("Jadwal buka operasional Klinik Laa Tachzan dari hari senin-jum'at dari jam 08.00-15.00");
                }
                elseif ($answer->getValue() == 'jadwal_dokter') {
                    $this->bot->reply("Dokter A: Senin, Rabu, Kamis");
                }
            }
        });
    }
}
