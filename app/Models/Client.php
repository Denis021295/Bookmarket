<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Book;
use App\Models\Comment;



class Client extends Authenticatable
{
    protected $table = "clients";
    protected $fillable = ['email','password'];

    public function books() 
	{
		return $this->belongsToMany(Book::class, 'books_clients');	
	}

	public function comments() 
	{
		return $this->hasMany(Comment::class);	
	}

	public function getImage()
	{
		return $this->img ? '../'.$this->img : '../public/images/not_image.png';
	}

	public function full_user_real_name()
	{
		return $this->first_name.' '.$this->last_name;
	}

}
