<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;

class UserController extends Controller
{
    public function index(){
        dd(Cache::pull('users'));
        $users = Cache::rememberForever('users', function (){
            return User::all();
        });
        return view('datatable', compact('users'));
    }
}
