<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\Table;
use App\Models\User;
use Illuminate\Http\Request;

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
        return view('orders.create', compact('tables', 'users'));
    }

    public function store(Request $request)
    {
        $data = $request->validate([
            'table_id' => 'required|exists:tables,id',
            'user_id' => 'required|exists:users,id',
            'total' => 'required|numeric|min:0',
            'status' => 'required|in:pending,paid,canceled'
        ]);
        Order::create($data);
        return redirect()->route('orders.index')->with('success', 'Order created successfully!');
    }

    public function show(Order $order)
    {
        return view('orders.show', compact('order'));
    }

    public function edit(Order $order)
    {
        $tables = Table::all();
        $users = User::where('role', 'waiter')->get();
        return view('orders.edit', compact('order', 'tables', 'users'));
    }

    public function update(Request $request, Order $order)
    {
        $data = $request->validate([
            'table_id' => 'required|exists:tables,id',
            'user_id' => 'required|exists:users,id',
            'total' => 'required|numeric|min:0',
            'status' => 'required|in:pending,paid,canceled'
        ]);
        $order->update($data);
        return redirect()->route('orders.index')->with('success', 'Order updated successfully!');
    }

    public function destroy(Order $order)
    {
        $order->delete();
        return redirect()->route('orders.index')->with('success', 'Order deleted successfully!');
    }
}
