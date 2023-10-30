<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use GuzzleHttp\Promise\Create;

use Illuminate\Validation\Rule;
use function Laravel\Prompts\password;

class UserController extends Controller
{
    public function register(Request $request){
        $input = $request->validate([
            'email' => ['required', 'email', Rule::unique('users', 'email')],
            'password' => ['required', 'min:8', 'confirmed']
        ]);
        $input['password']=bcrypt('password');
        User::create($input);
        return 'hello from tries';
    }
}
