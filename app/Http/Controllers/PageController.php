<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PageController extends Controller
{

    public function localcontacts() {
        $title = 'Local contacts';
        return view('pages.localcontacts', compact('title'));
    }

    public function admin() {
        $title = 'Admin';
        return view('pages.admin', compact('title'));
    }

}
