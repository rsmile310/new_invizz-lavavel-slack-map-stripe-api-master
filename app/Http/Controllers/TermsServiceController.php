<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TermsServiceController extends Controller
{
    //
    public function TermsService(){
        $pages = 'terms-service';
        return view('terms-service', compact('pages'));
    }
}
