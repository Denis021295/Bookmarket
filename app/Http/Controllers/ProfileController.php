<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;


class ProfileController extends Controller
{
    
	public function client(Client $client)
	{
		return view('profile.index', compact('client'));
	}

}
