<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;

class AuthorController extends Controller
{
    
	public function index(Author $author) 
	{
		try
		{
			$books = Book::where('author_id', $author->id)->with('authors','clients')->orderBy('id', 'desc')->paginate(6);
			$books[0]->flag = $author->name;
			return view('books.author', compact('books'));
		}
		catch(\Exception $e) 
    	{
    		abort(403, 'У автора нет книг');
    	}
	}

}
