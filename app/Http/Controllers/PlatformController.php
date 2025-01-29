<?php

namespace App\Http\Controllers;

use App\Models\Platform;
use Illuminate\Http\Request;
use Flasher\Prime\FlasherInterface;

class PlatformController extends Controller
{
    // show platform
    public function index(){

        $platforms=Platform::get();
        return view('backend.layout.platfrom.list',compact('platforms'));
    }
    //create
    public function create(){
        return view('backend.layout.platfrom.create');
    }
    //store
    public function store(Request $request){
        $validation=$request->validate([
            'name'=>'required|min:3|string'
        ]);
        $model=new Platform;
        $model->name=$request->name;
        $model->save();

        return redirect()->route('platform')->with('success','Platform Add Successfull');
    }
    public function edit($id){
        $data=Platform::findOrFail($id);
        return view('backend.layout.platfrom.edit',compact('data'));
    }
    public function update(Request $request, $id){
        $validation=$request->validate([
            'name'=>'required|min:3|string'
        ]);
        $data=Platform::findOrFail($id);
        $data->name=$request->name;
        $data->save();

        return redirect()->route('platform')->with('info','Data Update Successfull');
    }
    public function delete($id){
        $data=Platform::findOrFail($id);
        $data->delete();
        return redirect()->route('platform')->with('success','Data Deleted Successfull');
    }


}
