<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Author;
use App\Models\Genre;
use App\Models\Publisher;


class SearchController extends Controller
{
    public function index(Request $request) 
    {
    	$request->validate([
    		'q' => 'required|min:1',
    	]);

    	$q = $request->q;
        $res = collect([]);

    	$books = Book::where('title', 'LIKE', "%{$q}%")->with('authors','genres','publishers')->get();
        $authors = Author::where('name', 'LIKE', "%{$q}%")->get();
        $genres = Genre::where('name', 'LIKE', "%{$q}%")->get();
        $publishers = Publisher::where('name', 'LIKE', "%{$q}%")->get();

        $res->books = $books;
        $res->authors = $authors;
        $res->genres = $genres;
        $res->publishers = $publishers;

    	if ( $books->count() == 1 && $authors->count() == 0 && $genres->count() == 0 && $publishers->count() == 0  )
    	{
    		return redirect()->route('view.book', ['id' => $books[0]->id]);
    	}

        if ( $books->count() == 0 && $authors->count() == 1 && $genres->count() == 0 && $publishers->count() == 0  )
        {
            return redirect()->route('author.book', ['author' => $authors[0]->slug]);
        }

        if ( $books->count() == 0 && $authors->count() == 0 && $genres->count() == 1 && $publishers->count() == 0  )
        {
            return redirect()->route('genre.book', ['name' => $genres[0]->slug]);
        }

        if ( $books->count() == 0 && $authors->count() == 0 && $genres->count() == 0 && $publishers->count() == 1  )
        {
            return redirect()->route('publisher.book', ['name' => $publishers[0]->slug]);
        }

        return view('categories.books', compact('res'));

    }
}
