<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Publisher;


class PublisherController extends Controller
{
    
    public function index($name) 
    {
    	$books = Publisher::where('slug', '=', $name)->with('books')->get();
    	return view('books.author', compact('books'));
    }

}
