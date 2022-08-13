<?php

namespace App\Http\Controllers;

use App\Models\About;
use Carbon\Carbon;
use Illuminate\Http\Request;

class AboutController extends Controller
{
    public function ShowAbout(){

        $abouts = About::latest()->get();

        return view('admin.about.index', compact('abouts'));
    }

    public function AddAbout(Request $request){

        $request->validate([
            'title' => 'required',
            'short_dsc' => 'required',
            'long_dsc' => 'required'
        ]);

        About::insert([
            'title' => $request->title,
            'short_dsc' => $request->short_dsc,
            'long_dsc' => $request->long_dsc,
            'created_at' => Carbon::now()
        ]);

        return redirect()->back()->with('success', 'About Info has been added successfully.');
    }

    public function EditAbout($id){

        $abouts = About::find($id);

        return view('admin.about.edit', compact('abouts'));


    }

    public function DeleteAbout ($id){

        About::find($id)->delete();

        return redirect()->back()->with('success', 'About Info has been deleted successfully.');
    }
}
