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
    public function store(Request $request, FlasherInterface $flasher){
        $validation=$request->validate([
            'name'=>'required|min:3|string'
        ]);
        $model=new Platform;
        $model->name=$request->name;
        $model->save();

        return redirect()->back()->with('success','Platform Add Successfull');
    }
    public function edit(){
        return 'sdfsd';
    }


}
