<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;

class Rating extends Model
{
    
	protected $fillable = ['book_id', 'rating'];

    public function books()
    {
    	return $this->belongsTo(Book::class, 'book_id');
    }

}
