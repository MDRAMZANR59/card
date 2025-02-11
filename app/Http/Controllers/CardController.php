<?php

namespace App\Http\Controllers;

use App\Models\Card;
use App\Models\Amount;
use App\Models\Version;
use App\Models\Platform;
use App\Models\AmountCard;
use App\Models\CardVersion;
use Illuminate\Http\Request;

class CardController extends Controller
{
    public function index_home(){
        $cards =Card::get();
        // dd($datas);
        $platforms=Platform::get();
        return view('frontend.index', compact('cards','platforms'));
    }

    public function show($id){
        $datas=Card::findOrFail($id);
        $platforms=Platform::get();
        return view('frontend.singlecard',compact('datas','platforms'));
    }

     // show card
     public function index(){

        $cards=Card::get();
        return view('backend.layout.card.list',compact('cards'));
    }
    //create
    public function create(){
        $platform=Platform::get();
        $version=Version::get();
        $amount=Amount::get();
        return view('backend.layout.card.create',compact('platform','version','amount'));
    }
    //store
    public function store(Request $request)
    {
        $validation = $request->validate([
            'platform_id' => 'required|min:1|string',
            'title' => 'required|min:1|string',
            'usage' => 'required|min:1|string',
            'deliveryTime' => 'required|min:1|string',
            'version_id' => 'required|min:1|array',
            'version.*' => 'integer|exists:version,id',
            'amount_id' => 'required|min:1|array',
            'amount.*' => 'integer|exists:amount,id',
            'qty' => 'required|min:1|numeric',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:3068'
        ]);
    
        $imageName = null;
        if ($request->image) {
            $imageName = time() . '.' . $request->image->extension();
            $request->image->move(public_path('backend/img'), $imageName);
        }

        $model = new Card();
        $model->platform_id = $request->platform_id;
        $model->title = $request->title;
        $model->usage = $request->usage;
        $model->deliveryTime = $request->deliveryTime;
        $model->qty = $request->qty;
        $model->image = $imageName;
        $model->save();
    
        foreach ($request->amount_id as $amountId) {
            $AmountCard = new AmountCard();
            $AmountCard->amount_id = $amountId;
            $AmountCard->card_id = $model->id;
            $AmountCard->save();
        }

        foreach ($request->version_id as $versionId) {
            $CardVersion = new CardVersion();
            $CardVersion->version_id = $versionId;
            $CardVersion->card_id = $model->id;
            $CardVersion->save();
        }
    
        return redirect()->route('card')->with('success', 'Card Add Successfull');
    }
    
    public function edit($id){
        $olddata=Card::findOrFail($id);
        $platforms=Platform::get();
        $version=Version::get();
        $amounts=Amount::get();
        return view('backend.layout.card.edit',compact('olddata','platforms','version','amounts'));
    }

    public function update(Request $request, $id){
        $validation = $request->validate([
            'platform_id' => 'required|min:1|string',
            'title' => 'required|min:1|string',
            'usage' => 'required|min:1|string',
            'deliveryTime' => 'required|min:1|string',
            'version_id' => 'required|min:1|array',
            'version.*' => 'integer|exists:version,id',
            'amount_id' => 'required|min:1|array',
            'amount.*' => 'integer|exists:amount,id',
            'qty' => 'required|min:1|numeric',
            'image' => 'nullable|image|mimes:jpeg,jpg,png,gif|max:3068'
        ]);
       
        $data = Card::find($id);
        $data->platform_id = $request->platform_id;
        $data->title = $request->title;
        $data->usage = $request->usage;
        $data->deliveryTime = $request->deliveryTime;
        $data->qty = $request->qty;
    
        if ($request->hasFile('image')) {
            if ($data->image && file_exists(public_path('backend/img/' . $data->image))) {
                unlink(public_path('backend/img/' . $data->image));
            }
            $newImage = time() . '.' . $request->image->extension();
            $request->image->move(public_path('backend/img'), $newImage);
            $data->image = $newImage;
        }
    
        $data->update();
    
        $data->amountCard()->delete();
    
        $data->cardVersion()->delete();
    
        foreach($request->amount_id as $amountId){
            $amount=new AmountCard();
            $amount->amount_id = $amountId;
            $amount->card_id = $data->id;
            $amount->save();
            }

        foreach ($request->version_id as $versionId) {
            $version = new CardVersion();
            $version->version_id = $versionId;
            $version->card_id = $data->id;
            $version->save();
            
            }
    
        return redirect()->route('card')->with('info', 'Data Update Successfull');
    }
    
    public function delete($id){
        $data=Card::findOrFail($id);
        if($data->image){
            $imagePath=public_path('backend/img/'.$data->image);
            if(file_exists($imagePath)){
                unlink($imagePath);
            }
        }
        $data->delete();

        $amount= new AmountCard();
        $amount->delete();

        $version= new CardVersion();
        $version->delete();


        return redirect()->route('card')->with('success','Data Deleted Successfull');
    }

    
}
