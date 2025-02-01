<?php

namespace App\Http\Controllers;

use App\Models\Card;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index_home(){
        // return view('frontend.index');
        return view('frontend.index');
    }

     // show card
     public function index(){

        $cards=Card::get();
        return view('backend.layout.card.list',compact('cards'));
    }
    //create
    public function create(){
        return view('backend.layout.card.create');
    }
    //store
    public function store(Request $request){
        $validation=$request->validate([
            'name'=>'required|min:3|string'
        ]);
        $model=new Card;
        $model->name=$request->name;
        $model->save();

        return redirect()->route('card')->with('success','Card Add Successfull');
    }
    public function edit($id){
        $data=Card::findOrFail($id);
        return view('backend.layout.card.edit',compact('data'));
    }
    public function update(Request $request, $id){
        $validation=$request->validate([
            'name'=>'required|min:3|string'
        ]);
        $data=Card::findOrFail($id);
        $data->name=$request->name;
        $data->save();

        return redirect()->route('card')->with('info','Data Update Successfull');
    }
    public function delete($id){
        $data=Card::findOrFail($id);
        $data->delete();
        return redirect()->route('card')->with('success','Data Deleted Successfull');
    }

    
}
