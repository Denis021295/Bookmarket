<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Author;
use App\Models\Genre;
use App\Models\Publisher;
use App\Models\Language;
use App\Models\Client;
use App\Models\Comment;
use App\Models\Rating;



class Book extends Model
{

    protected $fillable = ['title','description','author_id','publisher_id','genre_id','language_id','year_pub','price','poster','pages','code'];


	public function authors() 
	{
		return $this->belongsTo(Author::class, 'author_id');
	}

	public function genres() 
	{
		return $this->belongsTo(Genre::class, 'genre_id');
	}

	public function publishers() 
	{
		return $this->belongsTo(Publisher::class, 'publisher_id');
	}

	public function languages() 
	{
		return $this->belongsTo(Language::class, 'language_id');
	}

	public function clients() 
	{
		return $this->belongsToMany(Client::class, 'books_clients');	
	}

	public function comments() 
	{
		return $this->hasMany(Comment::class);
	}

	public function ratings() 
	{
		return $this->hasOne(Rating::class, 'book_id');
	}

	public function getImage()
	{
		return $this->poster;
	}

}
