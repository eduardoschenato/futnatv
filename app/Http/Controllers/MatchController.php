<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;

use App\Http\Controllers\Controller;
use App\Match;
use App\Channel;

use Illuminate\Support\Facades\Validator;

class MatchController extends Controller {

    public function index() {
        $matches = Match::orderBy("date", "desc")->get();

        return view("matches", [
            "matches" => $matches
        ]);
    }

    public function create() {
        $match = new Match();
        $match->date = date("Y-m-d\T00:00:00");

        $channels = Channel::all();

        return view("match", [
            "match" => $match,
            "channels" => $channels
        ]);
    }

    public function store(Request $request) {
        $rules = [
            'team1' => 'required|min:3',
            'team2' => 'required|min:3'
        ];

        $messages = [
            'team1.required' => 'O campo time 1 deve ser preenchido',
            'team1.min' => 'O campo time 1 deve ter pelo menos 3 caracteres',
            'team2.required' => 'O campo time 2 deve ser preenchido',
            'team2.min' => 'O campo time 2 deve ter pelo menos 3 caracteres'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        $match = new Match();
        $match->team1 = $request->input("team1");
        $match->team2 = $request->input("team2");
        $match->date = $request->input("date");
        $match->save();

        $match->channels()->attach($request->input("channels"));
        
        return redirect()->route("matches-list");
    }

    public function edit($id) {
        $match = Match::find($id);

        $channels = Channel::all();

        return view("match", [
            "match" => $match,
            "channels" => $channels
        ]);
    }

    public function update(Request $request, $id) {
        $rules = [
            'team1' => 'required|min:3',
            'team2' => 'required|min:3'
        ];

        $messages = [
            'team1.required' => 'O campo time 1 deve ser preenchido',
            'team1.min' => 'O campo time 1 deve ter pelo menos 3 caracteres',
            'team2.required' => 'O campo time 2 deve ser preenchido',
            'team2.min' => 'O campo time 2 deve ter pelo menos 3 caracteres'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if($validator->fails()) {
            return back()->withErrors($validator);
        }

        $match = Match::find($id);
        $match->team1 = $request->input("team1");
        $match->team2 = $request->input("team2");
        $match->date = $request->input("date");
        $match->save();

        $match->channels()->sync($request->input("channels"));
        
        return redirect()->route("matches-list");
    }

    public function destroy($id) {
        $match = Match::find($id);
        $match->delete();

        return redirect()->route("matches-list");
    }

}
