@extends('layout') {{--  --}}

@section('content')
<div class="container mt-5">
    <h2>Shopping Cart</h2>
    
    @if(session('cart'))
        <table class="table table-bordered">
            <thead>
                <tr>
                    <th>Product</th>
                    <th>Price</th>
                    <th>Quantity</th>
                    <th>Subtotal</th>
                    <th>Action</th>
                </tr>
            </thead>
            <tbody>
                @php $total = 0 @endphp
                @foreach(session('cart') as $id => $details)
                    @php $total += $details['price'] * $details['quantity'] @endphp
                    <tr>
                        <td>{{ $details['name'] }}</td>
                        <td>${{ $details['price'] }}</td>
                        <td>{{ $details['quantity'] }}</td>
                        <td>${{ $details['price'] * $details['quantity'] }}</td>
                        <td>
                            {{-- Remove  --}}
                            <button class="btn btn-danger btn-sm">Remove</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
            <tfoot>
                <tr>
                    <td colspan="3" class="text-right"><strong>Total:</strong></td>
                    <td colspan="2"><strong>${{ $total }}</strong></td>
                </tr>
            </tfoot>
        </table>
        
        <div class="text-right">
            <a href="{{ url('/') }}" class="btn btn-primary">Continue Shopping</a>
            <a href="{{ url('/checkout') }}" class="btn btn-success">Proceed to Checkout</a>
        </div>
    @else
        <div class="alert alert-info">our Cart</div>
    @endif
</div>
@endsection
