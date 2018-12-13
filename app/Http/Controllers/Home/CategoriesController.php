<?php

namespace App\Http\Controllers\Home;

use App\Models\Category;
use App\Models\Topic;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoriesController extends Controller
{
    //
    public function show(Category $category,Request $request)
    {
        $topics = Topic::withOrder($request->order)->where(['category_id'=>$category->id])->paginate();
        return view('topics.index', compact('topics','category'));
    }
}
