<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;


class ProfileController extends Controller
{
    
	public function client(Client $client)
	{
		#dd( $client->comments[0]->books );
		return view('profile.index', compact('client'));
	}

}
