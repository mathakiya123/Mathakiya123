<?php

namespace App\Http\Controllers;
use App\Models\Contact;

use Illuminate\Http\Request;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('contact.add_contact');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {

        // validation in  laravel 

        $validation=$request->validate(
            [
                "name"=>"required|max:255",
                "email"=>"required|email",
                "phone"=>"required|max:10|min:10",
                "subject"=>"required|max:255",
                "message"=>"required",
            ]);

            $add=[
                "name"=>$request->name,
                "email"=>$request->email,
                "phone"=>$request->phone,
                "subject"=>$request->subject,
                "message"=>$request->message,
            ];

            // Used Eluolent ORM 
            $data=Contact::create($add);
            return redirect('/add')->with('success',"Send Message Successfully");
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        // Used Eluolent ORM
        $data=Contact::all();
        return view('contact.index',["data"=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        // Used Eluolent ORM
     $edits=Contact::where("id",$id)->first();
        return view('contact.edit_contact',["edits"=>$edits]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         $add=[
                "name"=>$request->name,
                "email"=>$request->email,
                "phone"=>$request->phone,
                "subject"=>$request->subject,
                "message"=>$request->message,
            ];

            // Used Eluolent ORM
            Contact::where('id',$id)->update($add);
            return redirect('/')->with('success',"Data Updated successfully");
        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        
            // Used Eluolent ORM
            Contact::where('id',$id)->delete();
            return redirect('/')->with('success',"Data Deleted successfully");
        
    }
}
