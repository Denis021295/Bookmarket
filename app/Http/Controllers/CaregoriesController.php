<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;
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
		#$genres = Genre::with('books')->get();
		#return view('categories.genres', compact('genres'));
		
		$res = collect([]);

		$un = Book::with('genres')->get()->unique('genre_id');

		foreach($un as $u) {
			$res->push([
				'name' => $u->genres->name,
				'slug' => $u->genres->slug,
				'count' => $u->genres->books->count(),
			]);
		}

		$genres = $res->sortByDesc('count');
		return view('categories.genres', compact('genres'));
	}

	public function publishers() 
	{
		$publishers = Publisher::with('books')->get();
		return view('categories.publishers', compact('publishers'));
	}

}
