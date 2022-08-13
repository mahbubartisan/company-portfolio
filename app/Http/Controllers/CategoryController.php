<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;

class CategoryController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index() {

        $categories = Category::latest()->paginate(4);

        $trashitems = Category::onlyTrashed()->latest()->paginate(3);

        return view ('admin.category.index', compact('categories', 'trashitems'));

    }

    public function store(Request $request){

        $data = $request->validate([
            'category_name' => 'required|unique:categories|max:255',
        ],
       
        [
            'category_name.required' => 'Please input a category name !',
            'category_name.unique' => 'Category must require an unique name !',
        ]);

        Category::create([

            'category_name'=>$request->category_name,
            'user_id'=>Auth::user()->id,
            'created_at'=>Carbon::now()

        ]);

        return redirect()->back()->with('success', 'Category has inserted successfully.');

    }

    public function edit($id){

        $categories = Category::find($id);

        return view('admin.category.edit', compact('categories'));

    }

    public function update(Request $request, $id){

        $update = Category::find($id)->update([
        'category_name' => $request->category_name,
        'user_id' => Auth::user()->id

        ]);

        return redirect()->route('categories')->with('success', 'Category has been updated.');

    }

    public function softdelete ($id){

    $trash = Category::find($id)->delete();

    return redirect()->back()->with('success', 'Category has trashed successfully.');

    }

    public function restore($id){

        $data = Category::withTrashed()->find($id)->restore();

        return redirect()->back()->with('success', 'Category has been restored.');

    }

    public function delete($id){

        $data = Category::onlyTrashed()->find($id)->forceDelete();

        return redirect()->back()->with('success', 'Category has deleted successfully.');

    }

}
