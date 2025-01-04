<?php

namespace App\Http\Controllers;
use App\Models\User;
use App\Models\book;
use Illuminate\Http\Request;
class UserController extends Controller
{


    public function getUsers(){
        return view ('users');
    }

    public function storeUsers(){
        return view ('users');
    }

    public function Addusers(){
        return 'add-user';
    }

    public function loadAllUsers(){
        $all_users = User::all();
        return view('/home', ['all_users' => $all_users]);
    }






    public function storeUser(Request $request){
        User::create([
            'name'=> $request['full_name'],
            'email'=> $request['email'],
            'password'=> $request['password'],
            'phone_number'=> $request['phone_number']
        ]);
        return redirect()->route('home')->with('success','Product added successfully.');
    }


//post user

    public function loadAllPost(){
        $all_post = User::all();
        return view('/post', ['all_users' => $all_post]);
    }

    public function storePost(Request $request){
        User::create([
            'name'=> $request['full_name'],
            'Details'=> $request['email'],
        ]);
        return redirect()->route('post')->with('success','Product added successfully.');
    }



    public function index()
    {
        $users = User::all();
        return view('users', compact('users'));
    }

    public function adminIndex()
    {
        $admins = User::where('role', 'admin')->get();
        return view('admin_users', compact('admins'));
    }

    public function booksIndex()
    {
        $books = Book::all();
        return view('books', compact('books'));
    }


}

