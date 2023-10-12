<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{

    public function index()
    {
        // dd(Category::all());
        // dd(Category::where('id', '>', 3)->get());

        dd(Category::find(3));

        $cats = Category::where('id', '>', 3)->get();
        foreach ($cats as $cat) {
            echo $cat->name . " - " . $cat->created_at . "<br>";
        }
    }

    public function store()
    {
        /* $category = new Category();
        $category->name = "Insert From Model";
        $category->category_id = 1;
        $category->save(); */

        $request = ['name' => 'hamada', 'category_id' => 2];
        Category::create($request);
    }
    public function update()
    {
        /* $category = Category::find(7);
        $category->name = "Insert From Model";
        $category->category_id = 1;
        $category->save(); */

        // $request = ['name' => 'hamada update 2', 'category_id' => 3];
        // Category::where('id', ">=", 6)->update($request);

        Category::find(5)->update(['name' => 'Beauty and personal care v2']);
    }

    public function delete()
    {
        // Category::destroy(6);
        // Category::destroy(7,8);
        // Category::where('id','>=',9)->delete();
        // dd(Category::oldest()->first());
        // dd(Category::latest()->first());
    }
}
