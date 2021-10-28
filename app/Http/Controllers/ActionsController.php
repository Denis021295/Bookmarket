<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use App\Models\Author;
use App\Models\Book;
use App\Models\Genre;
use App\Models\Language;
use App\Models\Publisher;


class ActionsController extends Controller
{
	public function __construct() 
	{
		return abort(500);
	}
}
