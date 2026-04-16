<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\blog;

class blogController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
        return view('blog.add_blog');
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
        $validation=$request->validate([
            "image"=>"image",
            "title"=>"required|max:255",
            "content"=>"required|max:255",

        ]);

// image path       
       $image = $request->file('image');
    $imagename = time() . '.' . $image->extension();
    $image->move(public_path('images'), $imagename);


    

        $add=[
            "image"=>$imagename,
            "title"=>$request->title,
            "content"=>$request->content,

        ];

        //UseEloquent ORM
        $data=blog::create($add);
        return redirect('/add')->with('success',"Blog Added Successfully");
        
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $data=blog::paginate(5);
      return view("blog.index",["data"=>$data]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $edit=blog::where('id',$id)->first();
        return view('blog.Edit_blog',["edit"=>$edit]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {


    
        $add=[
            "title"=>$request->title,
            "content"=>$request->content,
        
        ];

        
        if($request->hasfile('image'))
            {
           $image = $request->file('image');
    $imagename = time() . '.' . $image->extension();
    $image->move(public_path('images'), $imagename);

        $add['image']=$imagename;

            }
    


        $update=blog::where('id',$id)->update($add);
        return redirect('/')->with('success',"update Record Successfuly");
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
         $data=blog::where('id',$id)->delete();

        return redirect('/')->with('success',"Blog Deleted Successfully");
          
    }
}
