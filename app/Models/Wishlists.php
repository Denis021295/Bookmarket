<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;


class Wishlists extends Model
{
    protected $table = "wishlist";
    protected $fillable = ['client_id', 'book_id', 'created_at', 'updated_at'];

    public function books()
    {
    	return $this->belongsTo(Book::class, 'book_id');  
    }
}
