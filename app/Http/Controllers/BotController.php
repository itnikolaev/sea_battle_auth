<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Bot;
use Auth;

class BotController extends Controller
{
    public function __construct()
	{
		//$this->middleware('auth');
	}
	
	public function create()
	{
		$user_id = Auth::user()->id;
		$token = Bot::where('user_id',$user_id)->first();
		
		if(isset($token->auth_key)){
			$token = $token->auth_key;
		}
		
		return view('admin.bot.create', ['token'=>$token]);
	}
	
	public function getToken()
	{
		$user_id = Auth::user()->id;
		$token = uniqid('sea_battle_', true);
		$create_dt = date("Y-m-d H:i:s");
		
		$bot = new Bot();
		$bot->user_id = $user_id;
		$bot->auth_key = $token;
		$bot->created_at = $create_dt;
		$bot->updated_at = $create_dt;
		$bot->save();
		
		return view('admin.bot.create', ['token'=>$token]);
	}
}
