<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;

class CategoryController extends Controller
{
    public function index(Category $category)
    {
        return view('Categories.index')->with(['posts' => $category->getByCategory()]);
    }
}
