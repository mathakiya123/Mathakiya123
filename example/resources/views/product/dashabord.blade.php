@auth

<div style="display:flex; gap:20px; padding:20px;">

    <!-- 🔹 Left Side: User Profile -->
    <div style="width:25%; border:1px solid #ddd; padding:15px; border-radius:8px; box-shadow:2px 2px 10px rgba(0,0,0,0.1);">
        
        <h3>User Profile</h3>
        <p><strong>Name:</strong> {{ auth()->user()->name }}</p>
        <p><strong>Email:</strong> {{ auth()->user()->email }}</p>

        <hr>

        <h4>Manage</h4>
        <ul style="list-style:none; padding:0;">
         <li><a href="{{ route('profile.edit') }}">Edit Profile</a></li>
            <li><a href="#">My Orders</a></li>
              <li><a href="{{ route('cart.index') }}">My Cart</a></li>
        </ul>

        <form method="POST" action="{{ route('logout') }}">
            @csrf
            <button type="submit" style="margin-top:10px;">Logout</button>
        </form>
    </div>


    <!-- 🔹 Right Side: Products -->
    <div style="width:75%;">
        <h2>Products</h2>

        <div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(200px, 1fr)); gap: 15px;">
            
            @forelse ($products as $product)
                <div style="border:1px solid #ddd; padding:10px; border-radius:8px; text-align:center;">
                    
                    <img src="{{ asset('storage/' . $product->images) }}" 
                         style="width:100%; height:150px; object-fit:cover;">

                    <h4>{{ $product->name }}</h4>
                    <p>{{ $product->price }}</p>

                    <a href="{{ route('add.to.cart', $product->id) }}"
                       style="background:green; color:white; padding:5px 10px; text-decoration:none;">
                       Add to Cart
                    </a>
                </div>
            @empty
                <p>No products found</p>
            @endforelse

        </div>
    </div>

</div>

@endauth