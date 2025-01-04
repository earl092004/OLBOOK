<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProfileController extends Controller
{
    public function getProfiles(){
        return view ('profiles');
    }

    public function storeProfiles(){
        return view ('profiles');
    }
}
