<?php

namespace App\Conversations;

use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;

class NotCompletedTodoConversation extends Conversation
{
    protected $id_pasien;
    protected $nama;
    protected $jawaban;

    public function pasien()
    {
        $this->ask('Apakah anda pasien Klinik Laa Tachzan?', function(Answer $answer) {
            // Save result
            $jawab = $this->jawaban;
            $jawab = $answer->getText();

            if ($jawab == 'ya' || $jawab == 'iya' || $jawab == 'benar' || $jawab == 'betul') {
                $this->pasienTerdaftar();
            }
            elseif ($jawab == 'tidak' || $jawab == 'bukan' || $jawab == 'belum') {
                $this->pasienBelumTerdaftar();
            }
        });
    }

    public function pasienTerdaftar()
    {
        $this->bot->reply('Link login: ');
    }

    public function pasienBelumTerdaftar()
    {
        $this->ask('Siapa nama anda?', function(Answer $answer) {
            // Save result
            $this->nama = $answer->getText();

            $this->say('Nama anda, '.$this->nama);
        });
    }

    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function run()
    {
        // $this->bot->reply('not completed todos');
        $this->pasien();
    }
}
