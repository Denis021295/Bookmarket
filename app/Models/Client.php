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
    protected $hidden = ['created_at','updated_at','is_admin'];

    public function books() 
	{
		return $this->belongsToMany(Book::class, 'books_clients');	
	}

	public function comments() 
	{
		return $this->hasMany(Comment::class, 'client_id');	
	}

	public function getImage()
	{
		return $this->img ? '../'.$this->img : '../public/images/not_image.png';
	}

	public function full_user_real_name()
	{
		return $this->first_name.' '.$this->last_name;
	}

	public function hasBonus()
	{
		if ($this->books->count() > 0) 
		{
			return $this->books->count() * 15;
		}
		return false;
	}

}
