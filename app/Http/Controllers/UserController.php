<?php

namespace App\Http\Controllers;
use Session;
use App\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;
use Validator;
use Image;

class UserController extends Controller
{
    public function index(){
        $users = User::orderBy('id', 'desc')->paginate(10);
       // dd($users);

        return view("users", compact("users"));
    }

    public function create(){
        

        return view("create");
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(),[
            'name'=>'required|max:255',
            'email'=>'required|email|max:255|unique:users',
            'password'=>'required|min:6',
            'photo' => 'required|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($validator->fails()){
            return redirect()
            ->back()
            ->withErrors($validator)
            ->withInput();
        }

        $image = $request->file('photo');
        $filename = uniqid().$image->getClientOriginalName();
        $path = 'images/';
        $image->move($path, $filename);

        Image::make($path.$filename)->resize(100, 100)->save('thumbs/'.$filename);


        User::create([
            'name'=>$request->get('name'),
            'email'=>$request->get('email'),
            'password'=>$request->get('password'),
            'image'=>$path.$filename
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
            
        ]);

        Session::flash('success','User Update Successfully');
        return redirect('/users');
    }

    public function show($id){
        $user = User::find($id);
        if (empty($user)) {
            Session::flash('error', 'User not found');
            return redirect('users');
        }
        return view('detail',compact('user'));  
    }

    public function destroy($id){
        $user = User::find($id);
        if (empty($user)) {
            Session::flash('error', 'User not found');
            return redirect('users');
        }
          $user->delete();
          Session::flash('success','User Delete Successfully');
          return redirect('users');
    }

    
    
}
