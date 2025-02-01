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
            'name'=>'required|min:3|string'
        ]);
        $model=new Amount;
        $model->name=$request->name;
        $model->save();

        return redirect()->route('amount')->with('success','Amount Add Successfull');
    }
    public function edit($id){
        $data=Amount::findOrFail($id);
        return view('backend.layout.amount.edit',compact('data'));
    }
    public function update(Request $request, $id){
        $validation=$request->validate([
            'name'=>'required|min:3|string'
        ]);
        $data=Amount::findOrFail($id);
        $data->name=$request->name;
        $data->save();

        return redirect()->route('amount')->with('info','Data Update Successfull');
    }
    public function delete($id){
        $data=Amount::findOrFail($id);
        $data->delete();
        return redirect()->route('amount')->with('success','Data Deleted Successfull');
    }

}
