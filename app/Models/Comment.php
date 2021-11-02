<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Book;
use App\Models\Client;

class Comment extends Model
{

	protected $fillable = ['client_id','book_id', 'text'];
   	
   	public function books() 
	{
		return $this->belongsTo(Book::class, 'book_id');
	}

	public function clients() 
	{
		return $this->belongsTo(Client::class, 'client_id');
	}

	public function about_client($id) 
	{
		$client = Client::findOrFail($id);
		return $client;
	}

	public function title_user($id)
	{
		$data = Client::findOrFail($id);
		return $data->login ? $data->login : $data->email;
	}

}
