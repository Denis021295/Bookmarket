<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;


class SearchController extends Controller
{
    public function index(Request $request) 
    {
    	$request->validate([
    		'q' => 'required|min:1',
    	]);

    	$q = $request->q;
    	$books = Book::where('title', 'LIKE', "%{$q}%")->with('authors','genres')->get();
    	return view('categories.books', compact('books'));
    }
}
