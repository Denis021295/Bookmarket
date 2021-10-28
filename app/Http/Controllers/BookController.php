<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Book;
use App\Models\Client;
use App\Models\Rating;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;


class BookController extends Controller
{
    public function index() 
    {
    	$books = Book::with('authors')->orderBy('id', 'desc')->paginate(6);
    	return view('books.index', compact('books'));
    }

    public function view($id) 
    {
    	$book = Book::findOrFail($id);
    	return view('books.view', compact('book'));
    }

    private function nothing_or_write($client, $book) 
    {
        $check_count = DB::table('books_clients')->where([
            ['book_id', '=', $book->id],
            ['client_id', '=', $client->id]
        ])->count();

        if ($check_count == 0) {
            $client->books()->save($book);
        }
    }

    public function shop($id) 
    {
        $client = Client::find(Auth::user()->id);
    	$book = Book::find($id);
        $this->nothing_or_write($client, $book);

        $basket = Client::where('id', '=', $client->id)->with('books')->get();
        $books = $basket[0]->books;
        return view('shop.index', compact('books'));
    }

    public function sort(Request $request)
    {
        if ($request->sort == 'rating') {
            $books = collect([]);
            $ratings = Rating::orderBy($request->sort, 'desc')->get();
            foreach ($ratings as $rating) 
            {
                $books->push($rating->books);
            }
            return view('books.index', compact('books'));
        }

        $books = Book::orderBy($request->sort, 'desc')->get();
        return view('books.index', compact('books'));
    }

    public function rating(Request $request, Book $book) 
    {
        if (Rating::where('book_id', "=", $book->id)->get()->count() == 0) 
        {
            $book->ratings()->create([
                'book_id' => $book->id,
                'rating' => $request->rating
            ]);
            return redirect()->back();
        }
        else 
        {
            $avg = collect([$book->ratings->rating, $request->rating])->avg();
            $book->ratings()->update([
                'book_id' => $book->id,
                'rating' => $avg
            ]);
            return redirect()->back();
        }
    }

}
