<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Comment;



class MakecommentController extends Controller
{
    public function index(Request $request) 
    {
    	$request->validate([
    		'book_id' => 'required',
    		'client_id' => 'required',
    		'text' => 'required|min:3|max:2000',
    	]);

    	Comment::create([
    		'client_id' => $request->client_id,
    		'book_id' => $request->book_id,
    		'text' => $request->text,
    	]);

    	return redirect()->back();
    }

    public function delete(Request $request) 
    {
    	$request->validate([
    		'id' => 'required',
    	]);

    	Comment::destroy($request->id);
    	return redirect()->back();
    }
}
