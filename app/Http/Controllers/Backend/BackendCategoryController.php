<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Category;

class BackendCategoryController extends Controller
{
    public function index()
    {
        $categories = DB::table('categories')->select('*');
        $categories = $categories->paginate(2);

        return view("backend.category.index", compact('categories'));
    }

    public function create()
    {
        return view('backend.category.create');
    }

    public function store(Request $request)
    {
        $categories = DB::table('categories')->select('*')->get();
        foreach ($categories as $row)
        {
            if ($row->name == $request->name) return redirect()->action([BackendCategoryController::class, 'create']);
        }

        $category = new Category;
        $category->name = $request->name;
        $category->save();
        return redirect()->action([BackendCategoryController::class, 'create']);
    }

    public function edit($id)
    {
        $category = DB::table('categories')->where('id','=',$id)->get();
        return view('backend.category.edit',compact('category'));
    }

    public function update($id, Request $request)
    {
        $category = new category;
        $category->name = $request->name;
        DB::table('categories')->where('id','=',$id)->update(['name'=>$category->name]);
        return redirect()->action([BackendCategoryController::class, 'index']);
    }

    public function destroy($id)
    {
        DB::table('categories')->where('id', '=', $id)->delete();
        return redirect()->action([BackendCategoryController::class, 'index']);
    }
}
