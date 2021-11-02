<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use App\Models\Book;
use App\Models\Wishlists;
use App\Models\Comment;



class User extends Authenticatable
{
    //use HasApiTokens, HasFactory, Notifiable;


    protected $table = "clients";


    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function books() 
    {
        return $this->belongsToMany(Book::class, 'books_clients', 'client_id');  
    }

    public function wishlist() 
    {
        return $this->hasMany(Wishlists::class, 'client_id');
    }

    public function comments() 
    {
        return $this->hasMany(Comment::class, 'client_id'); 
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
