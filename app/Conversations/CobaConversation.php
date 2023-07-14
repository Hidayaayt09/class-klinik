<?php

namespace App\Conversations;

use App\Models\KategoriKonseling;
use Illuminate\Foundation\Inspiring;
use BotMan\BotMan\Messages\Incoming\Answer;
use BotMan\BotMan\Messages\Outgoing\Question;
use BotMan\BotMan\Messages\Outgoing\Actions\Button;
use BotMan\BotMan\Messages\Conversations\Conversation;

class CobaConversation extends Conversation
{
    protected array $menu;
    protected array $val;

    public function askFirst()
    {
        $data = KategoriKonseling::get();
        $q = "☕ Hari ini mau tau apa?\n";
        $i = 0;
        foreach($data['nama'] as $d) {
            $menu[$i] = $d['nama'];
            $val[$i] = $d['kategori_id'];
            $q .= "☞ ".ucwords($d['nama'])."\n";
            $i++;
        }

        $question = $this->createBtn($q,$menu,$val,count($menu));

        $this->ask($question, function($answer) {
            if ($answer->isInteractiveMessageReply()){
                switch ($answer->getValue()) {
                    case 'Kecanduan Narkoba':
                        $this->bot->startConversation(new InformasiConversation());
                        break;
                    
                    case 'Fobia':
                        $this->bot->startConversation(new KonsultasiConversation());
                        break;
                    
                    default:
                        # code...
                        break;
                }
                
            } else {
                $this->repeat();
            }
        });
    } 

    public function run()
    {
        $this->askFirst();
    }

    public function createBtn($main,array $text,array $val,$size)
    {
        switch ($size) {
            case 2:
                return Question::create($main)
                    ->addButtons([
                        Button::create(ucwords($text[0]))->value($val[0]),
                        Button::create(ucwords($text[1]))->value($val[1])
                    ]);
                break;

            case 3:
                return Question::create($main)
                    ->addButtons([
                        Button::create(ucwords($text[0]))->value($val[0]),
                        Button::create(ucwords($text[1]))->value($val[1]),
                        Button::create(ucwords($text[2]))->value($val[2])
                    ]);
                break;

            case 4:
                return Question::create($main)
                    ->addButtons([
                        Button::create(ucwords($text[0]))->value($val[0]),
                        Button::create(ucwords($text[1]))->value($val[1]),
                        Button::create(ucwords($text[2]))->value($val[2]),
                        Button::create(ucwords($text[3]))->value($val[3])
                    ]);
                break;
            
            default:
                return Question::create($main)
                ->addButtons([
                    Button::create(ucwords($text[0]))->value($val[0])
                ]);
                break;
        }
    }
}
