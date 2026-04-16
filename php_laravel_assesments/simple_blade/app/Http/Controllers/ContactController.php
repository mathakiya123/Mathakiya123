<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use App\http\Contollers\ContactController;
use App\Models\Contact;

class ContactController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
            $contacts=Contact::All();
            return view('task.admin.Contact_display',compact('contacts'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('task.contact');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
         $validated = $request->validate([
              
          'name' => 'required|max:255',
          'email' => 'required|email|max:255',
          'phone' => 'required|min:10|max:10',
          'subject' => 'required|max:255',
          'message' => 'required',
         ]);   

        //  create a ORM Elequent query builder for insert data
            
        $data=array(
            "name"=>$request->name,
            "email"=>$request->email,
            "phone"=>$request->phone,
            "subject"=>$request->subject,
            "message"=>$request->message,
        );
        // insert elequent ORM model
        Contact::create($data);
        return redirect('/contact-us')->with('success','Thanks for contact with us');

    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
       //edit 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         //update
    }

    /*
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Contact::find($id)->delete();

        return redirect('/admin/contact-manage')->with('sucess','deleted data succefully');
    }
}
