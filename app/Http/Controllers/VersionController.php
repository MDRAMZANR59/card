<?php

namespace App\Http\Controllers;

use App\Models\Version;
use Illuminate\Http\Request;

class VersionController extends Controller
{
    /**
     * Display the list of versions.
     */
    public function index()
    {
        $versions = Version::get();
        return view('backend.layout.version.list', compact('versions'));
    }

    /**
     * Show the form to create a new version.
     */
    public function create()
    {
        return view('backend.layout.version.create');
    }

    /**
     * Store a new version.
     */
    public function store(Request $request)
    {
        $validation = $request->validate([
            'name' => 'required|min:3|string',
        ]);

        $model = new Version;
        $model->name = $request->name;
        $model->save();

        return redirect()->route('version')->with('success', 'Version Added Successfully');
    }

    /**
     * Show the form to edit an existing version.
     */
    public function edit($id)
    {
        $data = Version::findOrFail($id);
        return view('backend.layout.version.edit', compact('data'));
    }

    /**
     * Update the version information.
     */
    public function update(Request $request, $id)
    {
        $validation = $request->validate([
            'name' => 'required|min:3|string',
        ]);

        $data = Version::findOrFail($id);
        $data->name = $request->name;
        $data->save();

        return redirect()->route('version')->with('info', 'Data Updated Successfully');
    }

    /**
     * Delete the version.
     */
    public function delete($id)
    {
        $data = Version::findOrFail($id);
        $data->delete();

        return redirect()->route('version')->with('success', 'Data Deleted Successfully');
    }
}
