<?php

namespace App\Http\Controllers\Backend;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Category;
use Illuminate\Support\Facades\DB;

class BackendCategoryController extends Controller
{
    public function index()
    {
        $categories = Category::select('*')->get();
        $data = [
            'categories' => $categories
        ];
        return response()->json($data);
    }

    public function delete($id)
    {
        Category::where('id', '=', $id)->delete();
        return 'done';
    }

    public function show($id)
    {
        $category = Category::where('id', '=', $id)->first();
        $data = [
            'category' => $category
        ];
        return response()->json($data);
    }

    public function update($id, Request $request)
    {
        $category = new Category;
        $category->name = $request->name;
        Category::where('id', '=', $id)->update(['name' => $category->name]);
        return 'done';
    }

    public function create(Request $request)
    {
        $category = Category::where('name', '=', $request->name)->first();
        if (!empty($category)) return response()->json([
            'errors' => [
                'Name' => ['Ten da ton tai']
            ],
            'message' => 'The given data was invalid.'
        ], 422);
        $categories = new Category;
        $categories->name = $request->name;

        $categories->save();
        return 'done';
    }
}