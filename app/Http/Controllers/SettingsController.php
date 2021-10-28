<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class SettingsController extends Controller
{
    
    public function index() 
    {
    	return view('settings.index');
    }


    public function data(Request $request) 
    {
    	$request->validate([
    		'id' => 'required',
    		'login' => 'nullable|min:3|unique:clients',
    		'first_name' => 'nullable|min:2',
    		'last_name' => 'nullable|min:2',
    		'poster' => 'nullable|image',
    	]);

    	$user = Client::findOrFail($request->id);

    	if ($request->hasFile('poster')) 
    	{
    		$image = $request->file('poster')->store("profiles");
    	} else {
    		$image = $user->poster;
    	}

    	if ($request->login) 
    	{ 
    		$user->login = $request->login;
    	}

    	if ($request->first_name)
    	{
    		$user->first_name = $request->first_name;
    	}

    	if ($request->last_name)
    	{
    		$user->last_name = $request->last_name;
    	}

    	if ($request->poster)
    	{
    		$user->img = $image;
    	}

    	$user->save();
    	session()->flash('success', 'Информация обновлена');
    	return redirect()->back();
    }


    public function new_password(Request $request) 
    {

    	$request->validate([
    		'password' => 'required|confirmed|min:6',
    		'currentpassword' => 'required|min:6',
    	]);

    	if(Auth::attempt([
	    		'id' => $request->id,
	    		'password' => $request->currentpassword,
    		])) 
    	{
	    	Client::where('id', '=', $request->id)->update(['password' => Hash::make($request->password)]);
	    	session()->flash('success', 'Пароль обновлен');
	    	return redirect()->back();
    	}
    	return abort(403);
    }

}
