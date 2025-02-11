<?php

namespace App\Http\Controllers;

use App\Models\Amount;
use Illuminate\Http\Request;

class AmountController extends Controller
{
    // Show amount
    public function index()
    {
        $amounts = Amount::get();
        return view('backend.layout.amount.list', compact('amounts'));
    }

    // Create
    public function create()
    {
        return view('backend.layout.amount.create');
    }

    // Store
    public function store(Request $request)
    {
        $validation = $request->validate([
            'title' => 'required|string',
        ]);

        $model = new Amount;
        $model->title = $request->title;
        $model->save();

        return redirect()->route('amount')->with('success', 'Amount Added Successfully');
    }

    // Edit
    public function edit($id)
    {
        $data = Amount::findOrFail($id);
        return view('backend.layout.amount.edit', compact('data'));
    }

    // Update
    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'title' => 'required|string',
        ]);

        $data = Amount::findOrFail($id);
        $data->title = $request->title;
        $data->save();

        return redirect()->route('amount')->with('info', 'Data Updated Successfully');
    }

    // Delete
    public function delete($id)
    {
        $data = Amount::findOrFail($id);
        $data->delete();
        return redirect()->route('amount')->with('success', 'Data Deleted Successfully');
    }
}
