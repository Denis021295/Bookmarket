<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Genre;
use App\Models\Publisher;


class CaregoriesController extends Controller
{
    
	public function authors() 
	{
		$authors = Author::with('books')->get();
		return view('categories.authors', compact('authors'));
	}

	public function genres() 
	{
		$genres = Genre::with('books')->get();
		return view('categories.genres', compact('genres'));
	}

	public function publishers() 
	{
		$publishers = Publisher::with('books')->get();
		return view('categories.publishers', compact('publishers'));
	}

}
