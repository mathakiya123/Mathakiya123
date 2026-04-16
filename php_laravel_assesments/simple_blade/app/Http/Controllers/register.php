<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\AddEmployee;
use App\Models\Task_Assign;
use App\Models\User;

use DB;

class register extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         return view('task.register');
    }

    // add registration 

    public function  add(Request $request)
    {
        $validation=$request->validate([
            'photo'=>"required",
            'fullname'=>"required|max:255",
            'email'=>"required|max:255",
            'phone'=>"required|max:255",
            'password'=>"required|max:255",
            
     ] );

     $filename=rand().'.'.$request->photo->extension();
     $request->photo->move(public_path('uploads'),$filename);

     $data=array(
        "photo"=>$filename,
        "fullname"=>$request->fullname,
        "email"=>$request->email,
        "phone"=>$request->phone,
        "password"=>$request->password,

     );

    
            User::create($data);
    return redirect('/login')->with("success","User Registerd Sucessfully");

    }


    // function user display
    public function shw()
    {
        $users=User::all();
        
        return view('task.admin.users_show',compact('users'));
    }

   //delete user

        public function delete(string $id)
        {
            User::where('id',$id)->delete();
            return redirect('/admin/user')->with('success','user deleted sucessfully');
        } 
    
    //login user
    public function login()
    {
        return view('task.login');
    }

     // create a function to load dashboard
    public function dashboard()
    {

    $emps=AddEmployee::all();
        return view('task.content',compact('emps'));
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
        //add task page

        $request->validate([
        'title' => 'required|string|max:255',
        'task_type' => 'required',
        'employee_id' => 'required',
        'date' => 'required|date',
        'start_time' => 'required',
        'end_time' => 'required',
        'description' => 'nullable|string'
    ]);

        $data=[
            "title"=>$request->title,
            "task_type"=>$request->task_type,
            "employee_id"=>$request->employee_id,
            "date"=>$request->date,
            "start_time"=>$request->start_time,
            "end_time"=>$request->end_time,
           "description"=>$request->description,    

        ];

        Task_Assign::create($data);

        return redirect('/dashboard')->with('success','task Added successfully');
    }


    //manage task

    public function edittask(string $id)
    {
         $emps =DB::table('add_employees')->get();
        $edittask=Task_Assign::where('id',$id)->first();
        return view('task.edit_task',compact('edittask','emps'));
    }

    //manage task display

    public function manage()
    {
        $tasks = DB::table('assigns')
        ->join('add_employees', 'assigns.employee_id', '=', 'add_employees.id')
        ->select(
            'assigns.*',
            'add_employees.name as employee_name'
        )
        ->get();

    return view('task.task_display', compact('tasks'));
    }

    
    /**
     * Display the specified resource.  
     */
    public function show()
    {
        $emps = AddEmployee::all(); 
        return view('task.managetask',compact('emps'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $data=[
            "title"=>$request->title,
            "task_type"=>$request->task_type,
            "employee_id"=>$request->employee_id,
            "date"=>$request->date,
            "start_time"=>$request->start_time,
            "end_time"=>$request->end_time,
           "description"=>$request->description,    

        ];

        Task_Assign::where('id',$id)->update($data);

        return redirect('/manage')->with('success','Updated Record sucessfully');


        
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        Task_Assign::where('id',$id)->delete();
             
       return redirect('/manage')->with('success','Delete Record sucessfully');
    }
}
