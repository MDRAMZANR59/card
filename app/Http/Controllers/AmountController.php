<?php

namespace App\Http\Controllers;

use App\Models\Amount;
use Illuminate\Http\Request;

class AmountController extends Controller
{
    // show amount
    public function index(){

        $amounts=Amount::get();
        return view('backend.layout.amount.list',compact('amounts'));
    }
    //create
    public function create(){
        return view('backend.layout.amount.create');
    }
    //store
    public function store(Request $request){
        $validation=$request->validate([
            'title'=>'required|min:1|string'
        ]);
        $model=new Amount;
        $model->title=$request->title;
        $model->save();

        return redirect()->route('amount')->with('success','Amount Add Successfull');
    }
    public function edit($id){
        $data=Amount::findOrFail($id);
        return view('backend.layout.amount.edit',compact('data'));
    }
    public function update(Request $request, $id){
        $validation=$request->validate([
            'title'=>'required|min:1|string'
        ]);
        $data=Amount::findOrFail($id);
        $data->title=$request->title;
        $data->save();

        return redirect()->route('amount')->with('info','Data Update Successfull');
    }
    public function delete($id){
        $data=Amount::findOrFail($id);
        $data->delete();
        return redirect()->route('amount')->with('success','Data Deleted Successfull');
    }

}
