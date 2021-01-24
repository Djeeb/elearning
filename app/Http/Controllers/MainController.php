<?php

namespace App\Http\Controllers;

use App\User;
use App\Course;
use App\Category;
use Illuminate\Http\Request;

class MainController extends Controller
{
    public function home(){
        $instructors = User::all();
        
        $category = Category::where('id', 2)->firstOrFail();
        return view('main.home', [
            'instructors' => $instructors
        ]);
    }
}
