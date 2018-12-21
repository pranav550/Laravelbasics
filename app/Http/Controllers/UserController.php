<?php

namespace App\Http\Controllers;
use Session;
use Illuminate\Http\Request;
use App\User;

class UserController extends Controller
{
    public function index(){
        $users = User::orderBy('id', 'desc')
        ->get();
        //dd($users);

        return view("users", compact("users"));
    }

    public function create(){
        

        return view("create");
    }

    public function store(Request $request)
    {
        User::create([
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'password'=>$request->get('password')
        ]);
        
         Session::flash('success','User Create Successfully');
         return redirect('/users');
    
    }

    public function edit($id){
        $user = User::find($id);
        if (empty($user)) {
            Session::flash('error', 'User not found');
            return redirect('users');
        }
        return view('edit',compact('user'));
    }

    public function update($id, Request $request){
        $user = User::find($id);

        if (empty($user)) {
            
            return redirect('users');
        }
        
        $user->update([
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'password'=>$request->get('password')
        ]);

        Session::flash('success','User Update Successfully');
        return redirect('/users');
    }

    
    
}
