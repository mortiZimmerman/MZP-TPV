<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Table;
use App\Models\User;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\OrderDetail;


class OrderController extends Controller
{
    public function index()
    {
        $orders = Order::with(['table', 'user'])->paginate(12);
        return view('orders.index', compact('orders'));
    }

 public function create()
{
    $tables = Table::all();
    $users = User::where('role', 'waiter')->get();
    $products = Product::all();

    return view('orders.create', compact('tables', 'users', 'products'));
}

    public function store(Request $request)
    {
         $request->validate([
        'table_id' => 'required|exists:tables,id',
        'user_id' => 'required|exists:users,id',
        'products' => 'required|string',
        ]);
          $products = json_decode($request->products, true);

           $total = 0;
    foreach ($products as $productId => $qty) {
        $product = Product::findOrFail($productId);
        // Restar stock:
        $product->stock -= $qty;
        $product->save();
        $total += $product->price * $qty;
    }
        $order = Order::create([
        'table_id' => $request->table_id,
        'user_id' => $request->user_id,
        'total' => $total,
        'status' => 'pending'
    ]);

    foreach ($products as $productId => $qty) {
    if ($qty > 0) {
        OrderDetail::create([
            'order_id' => $order->id,
            'product_id' => $productId,
            'quantity' => $qty,
            'price' => Product::find($productId)->price
        ]);
    }}
        return redirect()->route('admin.orders.index')->with('success', 'Order created!');
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

public function edit($id)
{
    $order = Order::findOrFail($id);
    $tables = Table::all();
    $users = User::where('role', 'waiter')->get();
    $products = Product::all();

    // Array de cantidades para precargar el form
    $orderDetails = [];
    foreach ($order->orderDetails as $detail) {
        $orderDetails[$detail->product_id] = $detail->quantity;
    }

    return view('orders.edit', compact('order', 'tables', 'users', 'products', 'orderDetails'));
}


public function update(Request $request, Order $order)
{
    $data = $request->validate([
        'table_id' => 'required|exists:tables,id',
        'user_id' => 'required|exists:users,id',
        'products' => 'required|string',
    ]);
    $products = json_decode($request->products, true);

    $total = 0;
    foreach ($products as $productId => $qty) {
        $product = Product::findOrFail($productId);
        $total += $product->price * $qty;
    }
    $order->update([
        'table_id' => $request->table_id,
        'user_id' => $request->user_id,
        'total' => $total,
    ]);

    // Limpia detalles y vuelve a crearlos
    $order->orderDetails()->delete();
    foreach ($products as $productId => $qty) {
        if ($qty > 0) {
            OrderDetail::create([
                'order_id' => $order->id,
                'product_id' => $productId,
                'quantity' => $qty,
                'price' => Product::find($productId)->price
            ]);
        }
    }

    return redirect()->route('admin.orders.index')->with('success', 'Order updated successfully!');
}

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully!');
    }
}
