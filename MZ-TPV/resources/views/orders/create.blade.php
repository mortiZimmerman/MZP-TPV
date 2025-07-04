@extends('layouts.app')
@if(auth()->user()->role === 'admin')
    @include('admin.partials.header')
@elseif(auth()->user()->role === 'waiter')
    @include('waiter.partials.header')
@endif
<link rel="stylesheet" href="{{ asset('css/orderForm.css') }}">
@section('content')
<div class="order-create-container" style="max-width:680px;margin:48px auto;">
    <h1>Create Order</h1>

    @if ($errors->any())
        <div class="alert alert-danger mb-3">
            <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
            </ul>
        </div>
    @endif

    <form action="{{ route('orders.store') }}" method="POST" id="order-form">
        @csrf

        <div class="mb-3">
            <label for="table_id" class="form-label"></label>
            <select name="table_id" id="table_id" class="form-select" required>
                <option value="">-- Select Table --</option>
                @foreach($tables as $table)
                    <option value="{{ $table->id }}">{{ $table->id }}</option>
                @endforeach
            </select>
        </div>

        <div class="mb-3">
            <label for="user_id" class="form-label"></label>
            <select name="user_id" id="user_id" class="form-select" required>
                <option value="">-- Select Waiter --</option>
                @foreach($users as $user)
                    <option value="{{ $user->id }}">{{ $user->name }}</option>
                @endforeach
            </select>
        </div>

        <h3 class="mt-4 mb-2">Products</h3>
        <div class="products-catalog-list mb-4" style="max-height:270px;overflow:auto;padding:8px 0;">
            <table class="table table-bordered align-middle mb-0">
                <thead>
                    <tr>
                        <th>Product</th>
                        <th>Price (€)</th>
                        <th>Quantity</th>
                        <th style="width:80px;">Actions</th>
                    </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                    <tr data-id="{{ $product->id }}">
                        <td>
                            <span>{{ $product->name }}</span>
                        </td>
                        <td>
                            <span class="product-price">{{ $product->price }}</span>
                        </td>
                        <td>
                            <span class="product-qty" id="qty-{{ $product->id }}">0</span>
                        </td>
                        <td>
                            <button type="button" class="btnOrderP" onclick="changeQty({{ $product->id }}, 1)">+</button>
                            <button type="button" class="btnOrderS" onclick="changeQty({{ $product->id }}, -1)">-</button>
                        </td>
                    </tr>
                @endforeach
                </tbody>
            </table>
        </div>

        <div class="mb-3 d-flex justify-content-between align-items-center" style="font-size:1.2rem;">
            <strong>Total:</strong>
            <span id="order-total">€0.00</span>
        </div>

        <input type="hidden" name="products" id="products-input">

        <button type="submit" class="btn btn-success w-100 mt-2">Save Order</button>
       <a href="{{ route('orders.index') }}"
 class="btnCancel">Cancel</a>
    </form>
</div>

@push('scripts')
<script>
let cart = {};
function changeQty(id, delta) {
    let qtySpan = document.getElementById('qty-' + id);
    let qty = parseInt(qtySpan.textContent) + delta;
    if(qty < 0) qty = 0;
    qtySpan.textContent = qty;
    cart[id] = qty;
    if(qty === 0) delete cart[id];
    calcTotal();
    updateHidden();
}
function calcTotal() {
    let total = 0;
    document.querySelectorAll('.product-qty').forEach(function(qtySpan) {
        let tr = qtySpan.closest('tr');
        let price = parseFloat(tr.querySelector('.product-price').textContent);
        let qty = parseInt(qtySpan.textContent);
        if(qty > 0) total += price * qty;
    });
    document.getElementById('order-total').textContent = '€' + total.toFixed(2);
}
function updateHidden() {
    document.getElementById('products-input').value = JSON.stringify(cart);
}
document.getElementById('order-form').onsubmit = function() {
    updateHidden();
};
</script>
@endpush
@endsection
