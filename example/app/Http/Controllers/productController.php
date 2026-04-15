<?php

namespace App\Http\Controllers;
use App\Models\product;
use App\Models\Category;
  use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use DB;

class productController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
     

     $categories = DB::table('categories')->select('id', 'name')->get();
    

            return view('product.Product_add',compact('categories'));
    }


    //new function

    public function  shw()
    {
        $products = Product::all(); // all products fetch

    return view('dashboard', compact('products'));

    } 


  

public function addToCart($id)
{
    $userId = Auth::id(); // current login user

    $cart = session()->get('cart_'.$userId, []);

    if(isset($cart[$id])) {
        $cart[$id]['quantity']++;
    } else {
        $product = \App\Models\Product::findOrFail($id);

        $cart[$id] = [
            "name" => $product->name,
            "price" => $product->price,
            "image" => $product->images,
            "quantity" => 1
        ];
    }

    session()->put('cart_'.$userId, $cart);

    return redirect()->back()->with('success', 'Product added to cart!');
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


//
//ability to filer products by category

public function store(Request $request)
{
    // 1. Validate the request data including the image
    $validatedData = $request->validate([
        'name'        => 'required|max:255',
        'desc'        => 'required',
        'price'       => 'required|numeric', // Added numeric validation
        'category_id' => 'required|integer', // Added integer validation
        'images'      => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048', // Validation for image
    ]);

    // 2. Initialize $data with validated data
    $data = [
        'name'        => $request->name,
        'desc'        => $request->desc,
        'price'       => $request->price,
        'category_id' => $request->category_id,
    ];

    // 3. Handle File Upload
    if ($request->hasFile('images')) {
        // Store in storage/app/public/products
        $path = $request->file('images')->store('products', 'public');
        $data['images'] = $path;
    }

    // 4. Create Product
    Product::create($data);

    return redirect()->back()->with('success', 'Product created successfully!');
}

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $products = Product::latest()->paginate(10);
    return view('product.dashabord', compact('products'));
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
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}












// public function index(Request $request)
// {
//     // Get all categories for the filter dropdown
//     $categories = Category::all();
    
//     // Query products, filtering by category if present
//     $products = Product::when($request->category_id, function ($query) use ($request) {
//         return $query->where('category_id', $request->category_id);
//     })->get();

//     return view('products.index', compact('products', 'categories'));
// }









































