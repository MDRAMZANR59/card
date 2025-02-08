<?php

namespace App\Http\Controllers;

use App\Models\Version;
use Illuminate\Http\Request;

class VersionController extends Controller
{
    // show version
    public function index(){

        $versions=Version::get();
        return view('backend.layout.version.list',compact('versions'));
    }
    //create
    public function create(){
        return view('backend.layout.version.create');
    }
    //store
    public function store(Request $request){
        $validation=$request->validate([
            'name'=>'required|min:3|string',
        ]);
        $model=new Version;
        $model->name=$request->name;
        $model->save();

        return redirect()->route('version')->with('success','Version Add Successfull');
    }
    public function edit($id){
        $data=Version::findOrFail($id);
        return view('backend.layout.version.edit',compact('data'));
    }
    public function update(Request $request, $id){
        $validation=$request->validate([
            'name'=>'required|min:3|string',
        ]);
        $data=Version::findOrFail($id);
        $data->name=$request->name;
        $data->save();

        return redirect()->route('version')->with('info','Data Update Successfull');
    }
    public function delete($id){
        $data=Version::findOrFail($id);
        $data->delete();
        return redirect()->route('version')->with('success','Data Deleted Successfull');
    }

}
