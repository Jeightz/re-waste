<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class UserAuthController extends Controller
{
public function login(Request $request){
$request->validate(['username'=>'required|string','password'=>'required|string']);

}

}
