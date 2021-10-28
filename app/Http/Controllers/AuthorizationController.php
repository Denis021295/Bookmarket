<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Client;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;


class AuthorizationController extends Controller
{
    
    public function login() 
    {
    	return view('authorization.login');
    }

    public function register() 
    {
    	return view('authorization.register');
    }

    public function store(Request $request) 
    {
    	$request->validate([
    		'email' => 'required|email|unique:clients',
    		'password' => 'required',
    	]);

    	$client = Client::create([
    		'email' => $request->email,
    		'password' => Hash::make($request->password),
    	]);

    	session()->flash('success', 'Региcтрация успешна!');
    	Auth::login($client);
    	return redirect()->home();

    }

    public function store_login(Request $request) 
    {
    	if (Auth::attempt([
    		'email' => $request->email,
    		'password' => $request->password,
    	])) 
    	{
    		session()->flash('success', 'Вход успешен');
    		return redirect()->home();
    	}
    	return redirect()->back()->with('error', 'Incorrect!');
    }

    public function logout() 
    {
    	Auth::logout();
    	session()->flash('success', 'Выход с учетной записи успешен');
    	return redirect()->home();
    }

}
