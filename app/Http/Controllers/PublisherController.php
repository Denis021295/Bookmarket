<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publisher;
use App\Models\Book;


class PublisherController extends Controller
{
    
    public function index($name) 
    {
    	try 
    	{
			$books = Book::where('publisher_id', function($query) use ($name) {
	    		$query->from(with(new Publisher)->getTable())->select('id')->where('slug', $name)->first();
	    	})->orderBy('id', 'desc')->with('authors')->paginate(6);
	    	$books[0]->flag = $name;
	    	return view('books.author', compact('books'));
    	}
    	catch(\Exception $e) 
    	{
    		abort(403, 'В издательства нет книг');
    	}
    	
    }

}
