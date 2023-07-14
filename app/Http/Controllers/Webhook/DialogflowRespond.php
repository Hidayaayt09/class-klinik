<?php

namespace App\Http\Controllers\Webhook;

use App\Http\Controllers\Controller;
use App\Models\Gejala;
use App\Models\Kategori;
use Illuminate\Http\Request;

class DialogflowRespond extends Controller
{
    protected $format = 'json';
    protected $gejala;

    protected $action;

    protected $parameters = [];

    protected $text;

    public function __construct()
    {
        $this->gejala = new Gejala();
        $this->action;
        $this->text;
        $this->parameters;
    }


}
