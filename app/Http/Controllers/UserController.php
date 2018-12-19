<?php

namespace App\Http\Controllers;
use Session;
use App\User;
use Illuminate\Http\Request;

class UserController extends Controller
{
    public function index(){

        $users = User::orderBy('id',"DESC")->get();
        return view("users", compact('users'));
    }

    public function create()
    {
        return view("create");
    }

    public function store(Request $request){
        User::create([
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'password'=>$request->get('password')
        ]);

        Session::flash('success', 'User Created Successfully');
        return redirect('/users');
    } 


}
