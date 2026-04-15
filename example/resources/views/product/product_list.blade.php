<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
@auth
<h2>product display all </h2>



<div style="display: grid; grid-template-columns: repeat(auto-fill, minmax(250px, 1fr)); gap: 20px; padding: 20px;">
    @forelse ($products as $product)
        <div style="border: 1px solid #ddd; border-radius: 8px; overflow: hidden; box-shadow: 2px 2px 10px rgba(0,0,0,0.1); text-align: center; padding: 15px;">
            <!-- Image Section -->
            <div style="height: 200px; display: flex; align-items: center; justify-content: center; background: #f9f9f9;">
                @if($product->images)
                    <img src="{{ asset('storage/' . $product->images) }}" style="max-width: 100%; max-height: 100%; object-fit: cover;" alt="{{ $product->name }}">
                @else
                    <span style="color: #999;">No Image Available</span>
                @endif
            </div>

            <!-- Content Section -->
            <div style="margin-top: 15px;">
                <h3 style="margin: 10px 0; font-size: 1.2rem;">{{ $product->name }}</h3>
                <p style="color: #666; font-size: 0.9rem; height: 40px; overflow: hidden;">{{ $product->desc }}</p>
                <p style="font-weight: bold; color: #2c3e50; font-size: 1.1rem;">
                    ${{ number_format($product->price, 2) }}
                </p>
            
                <!-- Example Actions -->
               <a href="{{ route('add.to.cart', $product->id) }}" 
   style="display:inline-block; background:#38c172; color:white; padding:8px 15px; border-radius:4px; text-decoration:none; margin-top:10px;">
   Add to Cart
</a>

                
            </div>
              
        </div>
    @empty
        <p style="grid-column: 1 / -1; text-align: center;">No products found.</p>
    @endforelse
</div>

@endauth
</body>
</html>












