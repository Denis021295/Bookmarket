<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Genre;
use App\Models\Book;


class GenreController extends Controller
{
    
    public function index($name) 
    {
    	try 
    	{
			$books = Book::where('genre_id', function($query) use ($name) {
    			$query->from(with(new Genre)->getTable())->select('id')->where('slug', 'LIKE' ,$name)->first();
	    	})->with('authors')->orderBy('id', 'desc')->paginate(6);
	    	$books[0]->flag = $name;
	    	return view('books.author', compact('books'));
    	} 
    	catch(\Exception $e) 
    	{
    		abort(403, 'Жанр пуст');
    	}

    }

}
