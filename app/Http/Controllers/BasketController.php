<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Client;
use Illuminate\Support\Facades\Auth;


class BasketController extends Controller
{
    public function index() 
    {
    	$client = Client::find(Auth::user()->id);
        $basket = Client::where('id', '=', $client->id)->with('books')->get();
        $books = $basket[0]->books;
        return view('shop.index', compact('books'));
    }
}
