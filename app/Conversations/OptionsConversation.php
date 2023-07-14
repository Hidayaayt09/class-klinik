<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;

class OptionsConversation extends Conversation
{
    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function run()
    {
        $question = Question::create("Ada yang bisa kami bantu?")
            ->fallback('Tidak dapat memilih opsi')
            ->callbackId('ask_about_option')
            ->addButtons([
                Button::create('Informasi Klinik')->value('informasi'),
                Button::create('Konsultasi Kesehatan Jiwa')->value('konsultasi'),
            ]);

        $this->bot->ask($question, function(Answer $answer) {
            if ($answer->isInteractiveMessageReply()) {
                $value = $answer->getValue();

                switch ($value) {
                    case 'informasi':
                        $this->bot->startConversation(new InformasiConversation());
                        break;
                    case 'konsultasi':
                        $this->bot->startConversation(new KonsultasiConversation());
                        break;
                }
            }
        });
    }
}
