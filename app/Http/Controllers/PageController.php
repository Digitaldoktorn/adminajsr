<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{

    public function board() {
        $title = 'Board';
        return view('pages.board', compact('title'));
    }

    public function localcontacts() {
        $title = 'Local contacts';
        return view('pages.localcontacts', compact('title'));
    }
}
