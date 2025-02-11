<?php

namespace App\Http\Controllers;

use App\Models\Platform;
use Illuminate\Http\Request;

class PlatformController extends Controller
{
    // Show list of platforms
    public function index()
    {
        $platforms = Platform::get();
        return view('backend.layout.platfrom.list', compact('platforms'));
    }

    // Show the form to create a new platform
    public function create()
    {
        return view('backend.layout.platfrom.create');
    }

    // Store a new platform
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|min:3|string',
        ]);

        $model = new Platform;
        $model->name = $request->name;
        $model->save();

        return redirect()->route('platform')->with('success', 'Platform Added Successfully');
    }

    // Show the form to edit an existing platform
    public function edit($id)
    {
        $data = Platform::findOrFail($id);
        return view('backend.layout.platfrom.edit', compact('data'));
    }

    // Update the platform details
    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'name' => 'required|min:3|string',
        ]);

        $data = Platform::findOrFail($id);
        $data->name = $request->name;
        $data->save();

        return redirect()->route('platform')->with('info', 'Platform Updated Successfully');
    }

    // Delete the platform
    public function delete($id)
    {
        $data = Platform::findOrFail($id);
        $data->delete();

        return redirect()->route('platform')->with('success', 'Platform Deleted Successfully');
    }
}
