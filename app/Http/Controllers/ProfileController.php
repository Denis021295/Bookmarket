<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use App\Models\Book;
use App\Models\Wishlists;


class ProfileController extends Controller
{
    
	public function client(Client $client)
	{
		return view('profile.index', compact('client'));
	}

	public function bonus(Client $client)
	{
		if ($client->id != auth()->user()->id) 
		{
			return abort(403, 'Доступ запрещен!');
		}

		$bns = $client->books->count() * 15;
		$books = Book::orderBy('id','desc')->with('authors')->limit(8)->get();
		session()->flash('ava', 1);
		return view('profile.bonus', compact('client','bns','books'));
	}

	public function coin(Client $client) 
	{
		if ($client->id != auth()->user()->id) 
		{
			return abort(403, 'Доступ запрещен!');
		}

		$coin = round((($client->books->count() * 15) * 0.01), 1);
		session()->flash('ava', 1);
		return view('profile.coins', compact('client','coin'));
	}


	public function wish(Client $client)
	{
		if ($client->id != auth()->user()->id) 
		{
			return abort(403, 'Доступ запрещен!');
		}

		$books = Wishlists::where('client_id', $client->id)->with('books', function($query){
			$query->with('authors');
		})->orderBy('id', 'desc')->paginate(5);
		session()->flash('ava', 1);
		return view('profile.list', compact('books','client'));
	}


	public function wish_del($id) 
	{
		Wishlists::destroy($id);
		return redirect()->back();
	}

}
