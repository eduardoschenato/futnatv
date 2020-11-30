<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use Illuminate\Support\Facades\Auth;

use App\Match;

class HomeController extends Controller {

    public function __construct() {
    }

    public function index() {
        $matches = Match::whereDate('date', date('Y-m-d'))->get();

        return view('home', [
            'matches' => $matches
        ]);
    }

    public function logout() {
        Auth::logout();
        return redirect()->route('home');
    }

}
