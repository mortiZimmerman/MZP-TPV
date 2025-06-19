@extends('layouts.app')
@include('admin.partials.header')

@section('content')
<div class="order-create-container" style="max-width:920px;margin:48px auto;">
    <h1 class="mb-4">Create Order</h1>

    <div class="products-grid" style="display:grid;grid-template-columns:repeat(auto-fit,minmax(160px,1fr));gap:34px 10px;justify-items:center;">
        @foreach($products as $product)
            <div class="product-circle" 
                 data-id="{{ $product->id }}" 
                 data-name="{{ $product->name }}" 
                 data-price="{{ $product->price }}" 
                 data-img="{{ $product->category ? $product->category->image_url : '' }}"
                 style="cursor:pointer;display:flex;flex-direction:column;align-items:center;justify-content:center;">
                <div style="width:80px;height:80px;border-radius:50%;overflow:hidden;background:#fff;box-shadow:0 3px 14px #0001;display:flex;align-items:center;justify-content:center;">
                    @if($product->category && $product->category->image_url)
                        <img src="{{ $product->category->image_url }}" alt="" style="width:80px;height:80px;object-fit:cover;">
                    @else
                        <span style="font-size:46px;">🍽️</span>
                    @endif
                </div>
                <span style="margin-top:8px;font-weight:600;">{{ $product->name }}</span>
                <span style="font-size:0.96em;margin-bottom:4px;">€{{ number_format($product->price,2) }}</span>
            </div>
        @endforeach
    </div>

    <div id="order-modal" style="display:none;position:fixed;inset:0;background:rgba(0,0,0,0.38);z-index:9999;align-items:center;justify-content:center;">
        <div style="background:#fff;padding:30px 24px 24px 24px;max-width:360px;width:100%;border-radius:18px;box-shadow:0 8px 40px #0004;position:relative;">
            <button type="button" onclick="closeOrderModal()" style="position:absolute;top:14px;right:18px;background:none;border:none;font-size:20px;cursor:pointer;">×</button>
            <div id="modal-img" style="width:76px;height:76px;border-radius:50%;overflow:hidden;background:#fafafa;box-shadow:0 2px 10px #0001;margin:auto;">
                <img id="modal-img-src" src="" alt="" style="width:76px;height:76px;object-fit:cover;">
            </div>
            <h2 id="modal-name" class="text-center mt-3" style="font-size:1.5em;"></h2>
            <div id="modal-price" class="text-center" style="font-size:1.15em;"></div>

            <div class="mb-2 mt-3">
                <label for="modal-table" class="form-label">Table</label>
                <select id="modal-table" class="form-select" required>
                    <option value="">-- Select Table --</option>
                    @foreach($tables as $table)
                        <option value="{{ $table->id }}">{{ $table->number }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-2">
                <label for="modal-waiter" class="form-label">Waiter</label>
                <select id="modal-waiter" class="form-select" required>
                    <option value="">-- Select Waiter --</option>
                    @foreach($users as $user)
                        <option value="{{ $user->id }}">{{ $user->name }}</option>
                    @endforeach
                </select>
            </div>

            <div class="d-flex justify-content-center align-items-center mb-3 mt-2" style="gap:18px;">
                <button type="button" class="btn btn-secondary" onclick="changeModalQty(-1)" style="font-size:1.4em;padding:0 12px;">-</button>
                <span id="modal-qty" style="font-size:1.45em;min-width:32px;display:inline-block;text-align:center;">1</span>
                <button type="button" class="btn btn-primary" onclick="changeModalQty(1)" style="font-size:1.4em;padding:0 12px;">+</button>
            </div>

            <div class="d-flex justify-content-between align-items-center mb-2" style="font-size:1.13em;">
                <span>Total:</span>
                <span id="modal-total" style="font-weight:600;">€0.00</span>
            </div>
            <form id="order-modal-form" action="{{ route('admin.orders.store') }}" method="POST">
                @csrf
                <input type="hidden" name="product_id" id="modal-product-id">
                <input type="hidden" name="quantity" id="modal-quantity">
                <input type="hidden" name="table_id" id="modal-table-hidden">
                <input type="hidden" name="user_id" id="modal-waiter-hidden">
                <button type="submit" class="btn btn-success w-100 mt-2">Save Order</button>
            </form>
        </div>
    </div>
</div>

@push('scripts')
<script>
let currentProduct = null;
let currentPrice = 0;
let currentImg = '';
function openOrderModal(product) {
    document.getElementById('order-modal').style.display = 'flex';
    document.getElementById('modal-product-id').value = product.dataset.id;
    document.getElementById('modal-qty').textContent = 1;
    document.getElementById('modal-quantity').value = 1;
    document.getElementById('modal-name').textContent = product.dataset.name;
    document.getElementById('modal-price').textContent = "€" + Number(product.dataset.price).toFixed(2);
    document.getElementById('modal-img-src').src = product.dataset.img || '';
    document.getElementById('modal-total').textContent = "€" + Number(product.dataset.price).toFixed(2);
    currentProduct = product;
    currentPrice = Number(product.dataset.price);
    currentImg = product.dataset.img || '';
    document.getElementById('modal-table').value = "";
    document.getElementById('modal-waiter').value = "";
    document.getElementById('modal-table-hidden').value = "";
    document.getElementById('modal-waiter-hidden').value = "";
}
function closeOrderModal() {
    document.getElementById('order-modal').style.display = 'none';
}
function changeModalQty(delta) {
    let qtySpan = document.getElementById('modal-qty');
    let qty = parseInt(qtySpan.textContent) + delta;
    if(qty < 1) qty = 1;
    qtySpan.textContent = qty;
    document.getElementById('modal-quantity').value = qty;
    document.getElementById('modal-total').textContent = "€" + (qty * currentPrice).toFixed(2);
}
Array.from(document.getElementsByClassName('product-circle')).forEach(function(el) {
    el.onclick = function() { openOrderModal(this); }
});
document.getElementById('modal-table').onchange = function() {
    document.getElementById('modal-table-hidden').value = this.value;
};
document.getElementById('modal-waiter').onchange = function() {
    document.getElementById('modal-waiter-hidden').value = this.value;
};
document.getElementById('order-modal-form').onsubmit = function(e) {
    if(!document.getElementById('modal-table').value || !document.getElementById('modal-waiter').value) {
        alert('Table and waiter are required.');
        e.preventDefault();
    }
};
</script>
@endpush
@endsection
