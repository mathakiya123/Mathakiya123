<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\AddEmployee;
class addEmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $employees=AddEmployee::all();
        return view('task.admin.Employee_list',compact('employees'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('task.admin.add_employee');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated=$request->validate([
            "name"=>"required|max:255",
            "age"=>"required:digits",
            "phone"=>"required|max:10|min:10",
            "address"=>"required|max:255",
        ]);

        AddEmployee::create($validated);
        return redirect('/admin/add_employees')->with('add','Employee added successsfully');
        
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */ 
    public function destroy(string $id)
    {
        $delete=AddEmployee::find($id)->delete();
      return redirect('/admin/add_employees')->with('delete', 'Employee deleted successfully');
    }
}
