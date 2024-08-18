<?php

namespace App\Http\Controllers;

use App\Models\Batik;
use App\Models\Category;
use App\Models\User;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        $batiks = Batik::inRandomOrder()->take(8)->get();
        $users = User::all();

        return view('welcome', compact('batiks', 'users'));
    }
    public function search(Request $request)
    {
        $categories = Category::all();
        $query = Batik::query();

        if ($request->has('category')) {
            $query->where('uuid_category', $request->input('category'));
        }

        if ($request->has('keyword')) {
            $keyword = '%' . $request->input('keyword') . '%';
            $query->where('name', 'like', $keyword);
        }

        $batiks = $query->get();
        $users = User::all();

        return view('user.search', compact('batiks', 'users', 'categories'));
    }
    public function store(){
        $batiks = Batik::all();
        $users = User::all();
        $categories = Category::all();

        return view('user.store', compact('batiks', 'users', 'categories'));
    }
    public function camera(Request $request, $uuid){
        $batiks = Batik::all();
        $select = Batik::where('uuid', $uuid)->first();
        
        return view('user.camera', compact('batiks', 'select'));
    }
}
