<?php

namespace App\Http\Controllers\Api\Auth;

use App\Http\Controllers\Controller;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Route;
use Laravel\Passport\Client;

class RegisterController extends Controller
{
    use IssueTokenTrait;

    private $client;

    public function __construct(){
        $this->client = Client::find(4);
    }

    public function register(Request $request){
        $this->validate($request, [
            'lastName' => 'required|string|max:255',
            'firstName' => 'required|string|max:255',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);

        $user = User::create([
            'lastName' => request('lastName'),
            'firstName' => request('firstName'),
            'email' => request('email'),
            'password' => Hash::make(request('password')),
            'pseudo' => request('pseudo')
        ]);

        return $this->issueToken($request, 'password');
    }
}