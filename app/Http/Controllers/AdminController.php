<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Publisher;
use App\Models\Language;


class AdminController extends Controller
{
    
	public function index() 
	{
        $posters = Book::select('id', 'poster', 'title')->get();
		return view('admin.index', compact('posters'));
	}

}
