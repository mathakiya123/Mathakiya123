<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Leave;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('leaves.create');
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
        $request->validate([
            'employee_name' => 'required',
            'type' => 'required',
            'start_date' => 'required|date',
            'end_date' => 'required|date|after_or_equal:start_date',
            'reason' => 'required',
            'status' => 'required',
        ]);

        $Leave=[
            'employee_name' => $request->employee_name,
            'type' => $request->type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'reason' => $request->reason,
           'status' => $request->status,
           
        ];

        leave::create($Leave);
        return redirect('/')->with('success','add leaves sucessfully');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
         $leaves = Leave::all();
         return view('leaves.index',compact('leaves'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit=Leave::where('id',$id)->first();
        return view('leaves.edit',compact('edit'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $Leave=[
            'employee_name' => $request->employee_name,
            'type' => $request->type,
            'start_date' => $request->start_date,
            'end_date' => $request->end_date,
            'reason' => $request->reason,
              'status' => $request->status,
        ];

         Leave::where('id', $id)->update($Leave);
        return redirect('/leave-list')->with('success','updated record sucessfully');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
      Leave::where('id',$id)->Delete();
         return redirect('/leave-list')->with('success','Delete record sucessfully');

         
    }
}
