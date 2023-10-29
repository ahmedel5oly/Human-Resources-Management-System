<?php

namespace App\Http\Controllers;

use App\Models\User;
use GuzzleHttp\Promise\Create;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function register(Request $request){
        $input=$request->validate([
            'email' => 'required',
            'password' => 'required'
        ]);
        User::create($input);
        return 'hello from tries';
    }
}
