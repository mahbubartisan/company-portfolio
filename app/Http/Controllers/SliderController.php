<?php

namespace App\Http\Controllers;

use App\Models\Slider;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon as SupportCarbon;
use Intervention\Image\Facades\Image;

class SliderController extends Controller
{
    public function ShowSlider(){

        $sliders = Slider::latest()->get();

        return view('admin.slider.index', compact('sliders'));

    }

    public function CreateSlider(Request $request){

      $request->validate([

      'title' => 'required|unique:sliders',
      'description'  => 'required',
      'image'  => 'required|mimes:jpg,png,webp,jpeg'
      
      ]);

      $slider_img = $request->file('image');

      $slider_img_gen = hexdec(uniqid()). '.'. $slider_img->getClientOriginalExtension();

      Image::make($slider_img)->resize(1980,1080)->save('image/slider/'. $slider_img_gen);

      $last_slider_img = 'image/slider/'. $slider_img_gen;

      Slider::insert([

        'title' => $request->title,
        'description' => $request->description,
        'image' => $last_slider_img,
        'created_at' =>Carbon::now()

      ]);

      return redirect()->back()->with('success', 'Slider has been added successfully.');

   

    }

    public function EditSlider($id){

        $slider = Slider::find($id);

        return view('admin.slider.edit', compact('slider'));


    }

    public function UpdateSlider (Request $request, $id){


        $old_img = $request->old_img;

        $slider_img = $request->file('image');

        if($slider_img){

            $slider_img_gen = hexdec(uniqid()). '.'. $slider_img->getClientOriginalExtension();

            Image::make($slider_img)->resize(1980,1080)->save('image/slider/'.$slider_img_gen);
    
            $slider_img_name = 'image/slider/'.$slider_img_gen;
    
            unlink($old_img);
    
            Slider::find($id)->update([
    
                'title' => $request->title,
                'description'=> $request->description,
                'image'=> $slider_img_name,
                'created_at'=> Carbon::now()
    
            ]);

        }else{
            Slider::find($id)->update([

                'title' => $request->title,
                'description'=> $request->description,
                'created_at'=> Carbon::now()
    
            ]);
        }

        return redirect()->back()->with('success', 'Slider image has been updated');

    }

}
