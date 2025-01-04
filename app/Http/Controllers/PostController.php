<?php

namespace App\Http\Controllers;

use App\Models\Post;
use Illuminate\Http\Request;

class PostController extends Controller
{
    public function loadAllPost(){
        $all_post = Post::all();
        return view('/post', ['all_users' => $all_post]);
    }

    public function storePost(Request $request){
        Post::create([
            'name'=> $request['full_name'],
            'Details'=> $request['email'],
        ]);
        return redirect()->route('post')->with('success','Product added successfully.');
    }

}
