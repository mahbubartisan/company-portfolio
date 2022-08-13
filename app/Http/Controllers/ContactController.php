<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ContactController extends Controller
{
    //
    public function ShowContact (){

        $contacts = Contact::all();

        return view ('admin.contact.index', compact('contacts'));
    }

    public function AddContact(Request $request){

        $request->validate([

            'address' => 'required',
            'email' => 'required',
            'phone' => 'required'

        ]);

        Contact::insert([

            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone

        ]);

        return redirect()->back()->with('success', 'Contact info has been added.');
    }

    public function EditContact($id){

        $contacts = Contact::find($id);

        return view('admin.contact.edit', compact('contacts'));

    }

    public function UpdateContact(Request $request, $id){

        Contact::find($id)->update([
            'address' => $request->address,
            'email' => $request->email,
            'phone' => $request->phone
        ]);

        return redirect()->route('admin.contact')->with('success', 'Contact Info has been updated.');

    }

    public function DeleteContact($id){

        Contact::find($id)->delete();

        return redirect()->back()->with('success', 'Contact Info has been updated.');

    }

    public function HomeContactPage(){

        $contacts = DB::table('contacts')->first();

        return view('pages.contact', compact('contacts'));

    }
}
