<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;

class AuthorController extends Controller
{
    
	public function index($name) 
	{
		$books = Author::where('slug', $name)->with('books')->get();
		return view('books.author', compact('books'));
	}

}
