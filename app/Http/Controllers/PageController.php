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

    public function admin() {
        $title = 'Admin';
        return view('pages.admin', compact('title'));
    }

    public function domains() {
        $title = 'Domains';
        return view('pages.domains', compact('title'));
    }

    public function communication() {
        $title = 'Communication';
        return view('pages.communication', compact('title'));
    }
}
