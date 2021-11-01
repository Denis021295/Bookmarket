<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Publisher;
use App\Models\Language;
use Illuminate\Support\Str;



class BookController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $books = Book::with('authors','genres')->paginate(10);
        return view('admin.books.content', compact('books'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $authors = Author::all();
        $genres = Genre::all();
        $languages = Language::all();
        $publishers = Publisher::all();
        return view('admin.books.add', compact('authors','genres','languages','publishers'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|max:2500',
            'author' => 'required|integer',
            'genre' => 'required|integer',
            'publisher' => 'required|integer',
            'language' => 'required|integer',
            'price' => 'required|integer',
            'pages' => 'required|integer',
            'poster' => 'required|image',
            'year_pub' => 'required|integer',
            'code' => 'required|integer|min:7|unique:books',
        ]);

        $image = $request->file('poster')->store("images");

        $book = Book::create([
            'title' => $request->title,
            'description' => $request->description,
            'author_id' => $request->author,
            'publisher_id' => $request->publisher,
            'genre_id' => $request->genre,
            'language_id' => $request->language,
            'year_pub' => $request->year_pub,
            'price' => $request->price,
            'poster' => $image,
            'pages' => $request->pages,
            'code' => $request->code,
        ]);

        session()->flash('success', 'Книга успешно добавлена!');
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $authors = Author::all();
        $genres = Genre::all();
        $languages = Language::all();
        $publishers = Publisher::all();

        $book = Book::where('id', $id)->with('authors','genres','publishers','languages')->get();
        return view('admin.books.edit_book', compact('book', 'authors','genres','languages','publishers'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'title' => 'required|min:3',
            'description' => 'required|max:2500',
            'author' => 'required|integer',
            'genre' => 'required|integer',
            'publisher' => 'required|integer',
            'language' => 'required|integer',
            'price' => 'required|integer',
            'pages' => 'required|integer',
            'poster' => 'nullable|image',
            'year_pub' => 'required|integer',
        ]);

        $book = Book::findOrFail($request->id);

        if ($request->hasFile('poster')) 
        {
            $image = $request->file('poster')->store("images");
        } else {
            $image = $book->poster;
        } 

        $book->title = $request->title;
        $book->description = $request->description;
        $book->author_id = $request->author;
        $book->publisher_id = $request->publisher;
        $book->genre_id = $request->genre;
        $book->language_id = $request->language;
        $book->year_pub = $request->year_pub;
        $book->price = $request->price;
        $book->pages = $request->pages;
        $book->poster = $image;
        $book->save();

        session()->flash('success', 'Книга успешно обновлена');
        return redirect()->back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        return abort(403, 'Удаление книг пока недоступно');
    }
}
