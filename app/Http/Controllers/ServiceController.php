<?php

namespace App\Http\Controllers;

use App\Models\Service;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Intervention\Image\Facades\Image;

class ServiceController extends Controller
{
    public function ShowServices (){

        $services = Service::all();

        return view('admin.service.index', compact('services'));

    }

    public function AddServices(Request $request){

        $image = $request->file('image');

        $image_gen = hexdec(uniqid(). '.'.$image->getClientOriginalExtension());

        Image::make($image)->resize(100,100)->save('image/service/'. $image_gen);

        $last_image_name = 'image/service/'. $image_gen;

        Service::insert([

            'title' => $request->title,
            'image' => $last_image_name,
            'description' => $request->description,
            'created_at' =>Carbon::now()

        ]);

        return redirect()->back()->with('success', 'Service has been added successfully.');

    }

    public function DeleteServices($id){

        $image = Service::find($id);
        $image_new = $image->image;

        unlink($image_new);

        Service::find($id)->delete();

        return redirect()->back()->with('success', 'Service deleted successfully.');
    }

    public function EditServices($id){

        $service = Service::find($id);

        return view('admin.service.edit', compact('service'));

    }

    public function UpdateServices(Request $request, $id){

        $old_service_img = $request->service_image;

        $service_img = $request->file('image');

        if($service_img){

        $service_img_gen = hexdec(uniqid().'.'.$service_img->getClientOriginalExtension());

        Image::make($service_img)->resize(100,100)->save('image/service/'.$service_img_gen);

        $new_service_img = 'image/service/'.$service_img_gen;

        unlink($old_service_img);

        Service::find($id)->update([

            'title' => $request->title,
            'image' => $new_service_img,
            'description' => $request->description,
            'created_at' => Carbon::now()

        ]);

        return redirect()->route('service')->with('success', 'Service has been updated.');

        }else{

        Service::find($id)->update([

            'title' => $request->title,
            'description' => $request->description,
            'created_at' => Carbon::now()

        ]);

        return redirect()->route('service')->with('success', 'Service has been updated.');

        }

    }
}
