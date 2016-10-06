<?php

namespace App\Http\Controllers\API;

use App\Text;
use App\Category;
use App\Http\Requests;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class TextController extends Controller
{
    public function index($category)
    {
        return Text::where('category_id', $category)->get();
    }

    public function store(Request $request, $category)
    {
        $this->validate($request, ['name' => 'required', 'text' => 'required']);

        $category = Category::find($category);
        $text = new Text($request->all());
        $category->texts()->save($text);

        return $text;
    }

    public function edit($category, $text)
    {
        return Text::findOrFail($text);
    }

    public function update(Request $request, $category, $text)
    {
        $this->validate($request, ['name' => 'required', 'text' => 'required']);

        $category = Category::findOrFail($category);
        
        $text = Text::findOrFail($text);
        $text->fill($request->all());

        $category->texts()->save($text);

        return $text;
    }

    public function destroy($category, $text)
    {
        $text = Text::findOrFail($text);
        $text->delete();

        return response()->json([]);
    }

}
