<?php

namespace App\Http\Controllers;

use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class CategoryController extends Controller
{
    public function manageCategory($id=0){
        $categories = Category::where('parent_id', '=',$id)->get();
        $allCategories = Category::where('parent_id', '=',$id)->get();
        $name = Category::where('id',$id)->first();
        return view('category.CategoryView',compact('categories','allCategories','id','name'));
    }

    public function addCategory(CategoryRequest $request, $id = 0){
        $input = $request->all();
        $input['parent_id'] = empty($input['parent_id']) ? $id : $input['parent_id'];

        Category::create($input);
        return back()->with('success', 'New Category added successfully.');
    }

    public function editCategory($id){
        $category = Category::findOrFail($id);
        $allCategories = Category::where('parent_id', '<',$id)->get();
        return view('category.CategoryEdit',compact(['id','allCategories','category']));
    }

    public function updateCategory($id,Request $request){
        $category = Category::findOrFail($id);
        $category->title = $request['title'];
        $category->parent_id = $request['parent_id'];
        $category->save();

        return back()->with('success', 'Category has been edit');
    }

    public function removeCategory($id){
        DB::table('categories')->where('parent_id',$id)->delete();
        Category::findOrFail($id)->delete();
        return redirect()->route('get.category')->with('success', 'Category has been deleted');
    }
}
