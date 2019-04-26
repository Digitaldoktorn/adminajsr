<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{
    public function index(){
        return view('pages.index');
    }
    public function board() {
        return view('pages.board');
    }

    public function localcontacts() {
        return view('pages.localcontacts');
    }
}
