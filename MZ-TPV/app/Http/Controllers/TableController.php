<?php
namespace App\Http\Controllers;

use App\Models\Table;
use Illuminate\Http\Request;

class TableController extends Controller
{

   public function index()
{
    $tables = Table::paginate(12); // O el número que quieras por página
    return view('tables.index', compact('tables'));
}

    public function create()
    {
        return view('tables.create');
    }

public function store(Request $request)
{
    $data = $request->validate([
        'number' => 'required|unique:tables,number',
        'status' => 'required|in:free,occupied,reserved'
    ]);
    Table::create($data);
    return redirect()->route('tables.index');
}



    public function show(Table $table)
    {
        return view('tables.show', compact('table'));
    }

    public function edit(Table $table)
    {
        return view('tables.edit', compact('table'));
    }

   public function update(Request $request, Table $table)
{
    $data = $request->validate([
        'number' => 'sometimes|required|unique:tables,number,' . $table->id,
        'status' => 'sometimes|required|in:free,occupied,reserved',
        'x' => 'sometimes|required|integer',
        'y' => 'sometimes|required|integer',
    ]);

    $table->update($data);

    return response()->json($table);
}

   public function destroy(Table $table)
{
    $table->delete();

    return response()->json(['deleted' => true]);
}
}