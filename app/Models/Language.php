<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;


class Language extends Model
{
    //use HasFactory;

	protected $primaryKey = "id";
	protected $fillable = ['name'];

	public function books() 
	{
		return $this->hasMany(Book::class);
	}

}
