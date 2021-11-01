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
        $basket = Client::where('id', auth()->user()->id)->with('books', function ($query){
        	$query->with('authors');
        })->get();
        $books = $basket[0]->books;
        return view('shop.index', compact('books'));
    }
}
