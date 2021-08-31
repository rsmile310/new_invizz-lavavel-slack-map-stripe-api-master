<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Vluzrmos\SlackApi\Facades\SlackChat;

class SlackController extends Controller
{
    //
    public function slack(){
        \SlackChat::message('#general', 'Hello my friends!');
        echo json_encode('ok');
    }
}
