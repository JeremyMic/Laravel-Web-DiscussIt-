<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function loginPage(){
        return view('login');
    }

    public function registerPage(){
        return view('register');
    }

    public function createPost() {
        $data = Category::all();

        return view('Post/create_post', compact('data'));
    }
}
