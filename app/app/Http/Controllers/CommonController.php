<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CommonController extends Controller
{
    public function home() {
        $categories = Category::with('posts')->get();

        return view('common/home', [
            'categories' => $categories,
        ]);
    }
}
