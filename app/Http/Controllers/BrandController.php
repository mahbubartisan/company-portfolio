<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use App\Models\Brand;
use App\Models\Multipics;
use Illuminate\Http\Request;
use Illuminate\Support\Arr;
use Illuminate\Support\Facades\Auth;
use Intervention\Image\Facades\Image;


class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function brands (){

        $brands = Brand::latest()->paginate(3);

        return view ('admin.brand.index', compact('brands'));

    }

    public function storebrand (Request $request){

        $data = $request->validate([

            'brand_name' => 'required|unique:brands|min:4',
            'brand_img' => 'required|mimes:jpg,jpeg,png,webp',

        ]);

        $brand_img = $request->file('brand_img');

        // $brand_gen = hexdec(uniqid());
        // $brand_ext = strtolower($brand_img->getClientOriginalExtension());
        // $img_name = $brand_gen. '.'. $brand_ext;
        // $img_location = 'image/brand/';
        // $last_img = $img_location.$img_name;
        // $brand_img->move($img_location,$img_name);

        // Image Intervention Package

        $img_gen = hexdec(uniqid(). '.'.$brand_img->getClientOriginalExtension());

        Image::make($brand_img)->resize(300,200)->save('image/brand/'. $img_gen);

        $last_img = 'image/brand/'. $img_gen;

        Brand::insert([

            'brand_name' => $request->brand_name,
            'brand_img' => $last_img,
            'created_at' => Carbon::now()

        ]);

        return redirect()->back()->with('success', 'Brand insterted succesfully.');

    }

    public function edit($id){

        $brands = Brand::find($id);

        return view('admin.brand.edit', compact('brands'));

    }

    public function update(Request $request, $id){


      $request->validate([

            'brand_name' => 'required|min:4',
            // 'brand_img' => 'required|mimes:jpg,jpeg,png',

        ]);


        $old_img = $request->old_img;

        $brand_img = $request->file('brand_img');
        
        if($brand_img){
    
        $brand_gen = hexdec(uniqid());
        $brand_ext = strtolower($brand_img->getClientOriginalExtension());
        $img_name = $brand_gen. '.'.$brand_ext;
        $img_path = 'image/brand/';
        $last_img = $img_path.$img_name;
        $brand_img->move($img_path,$img_name);

        
            unlink($old_img);
    
            Brand::find($id)->update([
    
            'brand_name' => $request->brand_name,
            'brand_img' => $last_img,
            'created_at' => Carbon::now()
    
            ]);

            return redirect()->back()->with('success', 'Brand Updated Successfully.');

        }else{

             Brand::find($id)->update([
            'brand_name' => $request->brand_name,
            'created_at' => Carbon::now()
    
            ]);

            return redirect()->back()->with('success', 'Brand Updated Successfully.');
        }
        

    }

    public function delete ($id){

        $img = Brand::find($id);
        $old_img = $img->brand_img;

        unlink($old_img);

        Brand::find($id)->delete();

        return redirect()->back()->with('success', 'Brand deleted successfully.');

    }

    // Multiuple Images

    public function images(){
        $images = Multipics::all();

        return view ('admin.multipics.index', compact('images'));
    }

    public function storeimages(Request $request){

        $images = $request->file('images');

        // if (is_array($images) || is_object($images)){


        foreach((array)$images as $image ){

        $multi_img_gen = hexdec(uniqid()). '.'.$image->getClientOriginalExtension();

        Image::make($image)->resize(300,300)->save('image/multipics/'.$multi_img_gen);

        $last_img = 'image/multipics/'.$multi_img_gen;

        Multipics::insert([

            'image'=> $last_img,
            'created_at' =>Carbon::now()

        ]);

         }

        

        return redirect()->back()->with('success', 'Multiple images uploaded successfully.');

    }

    public function logout(){

        Auth::logout();

        return redirect()->route('login');

    }
}
