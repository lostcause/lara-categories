<?php

namespace App\Http\Controllers\API;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{

    public function index()
    {
        return Category::all();
    }

    public function store(Request $request)
    {
        $this->validate($request, ['name' => 'required']);

        $category = Category::create($request->all());

        return $category;
    }

    public function edit($id)
    {
        return Category::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $this->validate($request, ['name' => 'required']);

        $category = Category::findOrFail($id);
        $category->fill($request->all());
        $category->save();

        return $category;
    }

    public function destroy($id)
    {
        $category = Category::findOrFail($id);
        $category->delete();

        return response()->json([]);
    }

}
