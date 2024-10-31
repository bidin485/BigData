<?php

namespace App\Http\Controllers;
use App\Models\Category;

use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function index()
  {
      $categories = Category::all();
      return view('admin.category.index', ['categories' => $categories]);
  }

  public function create()
    {
        return view('admin.category.create');
    }  

    public function store(Request $request)
    {
        $code = $request->code;
        $name = $request->name;

        $cat = new Category();

        $cat->code = $code;
        $cat->name = $name;
        $cat->save();

        return redirect('categories');
    }

    public function edit($id)
    {
        $category = Category::find($id);

        return view('admin.category.edit', ['category' => $category]);
    }

    public function update(Request $request, $id)
    {
        $category = Category::find($id);

        $category->code = $request->code;
        $category->name = $request->name;
        $category->save();

        return redirect('categories');
    }

    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect('categories');
    }
}
