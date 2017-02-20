<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class TournamentController extends Controller
{
    public function create(){
		return view('admin.tournament.create');
	}
}
