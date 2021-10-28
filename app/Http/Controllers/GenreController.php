<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;


class GenreController extends Controller
{
    
    public function index($name) 
    {
    	$books = Genre::where('slug', '=', $name)->with('books')->get();
    	return view('books.author', compact('books'));
    }

}
