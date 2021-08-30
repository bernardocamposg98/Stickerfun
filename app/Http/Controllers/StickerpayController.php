<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sticker;
use App\Models\Stickerpay;

class StickerpayController extends Controller
{
    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {
        //
    }

    public function create()
    {
        //
    }

    public function store(Request $request)
    {
        //
    }

    public function show($id)
    {
        //
    }

    public function edit($id)
    {
        $sticker = Sticker::find($id);
        $stickerpay = new Stickerpay;
        $stickerpays = $stickerpay->where('sticker_id',$id)->get();
        
        return view('stickerpay.edit', compact('sticker'),['stickerpays'=>$stickerpays]);
    }

    public function update(Request $request, $id)
    {
        $stickerpays = $request->file('pays');
        dd($stickerpays);
        $pay = new Stickerpay;
        $pays = $pay->where('sticker_id',$id)->delete();
        
        foreach($stickerpays as $stickerspay){
                $pay = new pay();
                $name = $stickerspay;
                $pay->name = $name;
                $pay->sticker_id = $id;
                $pay->save();
                // echo($name);
        }

        return redirect()->route('stickers.index');
    }

    public function destroy($id)
    {
        //
    }
}
