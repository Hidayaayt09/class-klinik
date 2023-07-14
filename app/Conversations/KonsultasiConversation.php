<?php

namespace App\Conversations;

use App\Models\Gejala;
use App\Repositories\TodoRepositoryInterface;
use BotMan\BotMan\Messages\Conversations\Conversation;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Outgoing\Question;

class KonsultasiConversation extends Conversation
{
    protected $gejala;

    protected $email;

    public function pembukaan()
    {
        $jml = Gejala::count('gejala_id');
        $data_gejala = Gejala::get();

        $this->ask('Jawablah ya atau tidak untuk beberapa pertanyaan dibawah ini!', function(Answer $answer) {
            // for ($i=0; $i < $jml; $i++) {
            //     $this->askGejala($i);
            // }
            $this->askGejala(1);
        });
    }

    public function askGejala()
    {
        $data_gejala = Gejala::find(1);
        $ask_gejala = "Jawablah ya atau tidak untuk beberapa pertanyaan dibawah ini! \n";
        $ask_gejala .= "Apakah anda mengalami ".$data_gejala->nama_gejala."?";

        $this->ask($ask_gejala, function(Answer $answer) {
            $jawaban = $answer->getText();
            if ($jawaban=='ya'|$jawaban=='iya') {
                $this->say('Masuk');
            }
            elseif ($jawaban=='tidak'|$jawaban=='tdk') {
                $this->say('Tidak Masuk');
            }
        });
    }

    public function askGejala1()
    {
        $ask_gejala = Gejala::first();
        $id = $ask_gejala->gejala_id+1;

        $this->ask('Apakah anda mengalami '.$ask_gejala->nama_gejala.'?', function(Answer $answer) {
            // $jawaban = $answer->getText();
            // if ($jawaban=='ya'|$jawaban=='iya') {
            //     # code...
            // }
            $this->askGejala2(2);
        });
    }

    public function askGejala2($id)
    {
        $ask_gejala = Gejala::find($id);
        // $no = $id+1;

        $this->ask('Apakah anda mengalami '.$ask_gejala->nama_gejala.'?', function(Answer $answer) {
            $this->askGejala3(3);
        });
    }

    public function askGejala3($id)
    {
        $ask_gejala = Gejala::find($id);

        $this->ask('Apakah anda mengalami '.$ask_gejala->nama_gejala.'?', function(Answer $answer) {
            $this->askGejala4(4);
        });
    }

    public function askGejala4($id)
    {
        $ask_gejala = Gejala::find($id);

        $this->ask('Apakah anda mengalami '.$ask_gejala->nama_gejala.'?', function(Answer $answer) {
            $this->askGejala5(5);
        });
    }

    public function askGejala5($id)
    {
        $ask_gejala = Gejala::find($id);

        $this->ask('Apakah anda mengalami '.$ask_gejala->nama_gejala.'?', function(Answer $answer) {
            $this->askGejala6(6);
        });
    }

    public function askGejala6($id)
    {
        $ask_gejala = Gejala::find($id);

        $this->ask('Apakah anda mengalami '.$ask_gejala->nama_gejala.'?', function(Answer $answer) {
            $this->askGejala7(7);
        });
    }

    public function askGejala7($id)
    {
        $ask_gejala = Gejala::find($id);

        $this->ask('Apakah anda mengalami '.$ask_gejala->nama_gejala.'?', function(Answer $answer) {

            $this->say('Anda menderita: ');
        });
    }

    public function askNextStep()
    {
        $this->ask('Shall we proceed? Say YES or NO', [
            [
                'pattern' => 'yes|yep',
                'callback' => function () {
                    $this->say('Okay - we\'ll keep going');
                }
            ],
            [
                'pattern' => 'nah|no|nope',
                'callback' => function () {
                    $this->say('PANIC!! Stop the engines NOW!');
                }
            ]
        ]);
    }

    /**
     * Start the conversation.
     *
     * @return mixed
     */
    public function run()
    {
        $this->askGejala1();
    }
}
