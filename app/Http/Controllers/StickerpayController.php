<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sticker;
use App\Models\Stickerpay;
use Illuminate\Filesystem\Filesystem;

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
        $check = $request->input('check');

        $pay = new Stickerpay;
        // $pays = $pay->where('sticker_id',$id)->where('id',"like",$check)->get();
        // dd($pays);
        $sti = $request->all();
        
        $i = 1;
        $numSticker = 0;
        
        if($image = $request->file('pays')) {
            
            $destinationPack = public_path('Pack'.$id.'/Sticker');
            // dd($destinationPack.$i.".jpg");
            for($j = 0; $j < 1000; $j++){

                if(file_exists($destinationPack.$j.".wepp" == $check)){
                    dd("No borrar");
                    unlink($destinationPack.$j.".webp");
                    
                }
            }
            // dd("increibleeee");
            $sti = $sti['pays'];
            foreach($sti as $stickerspay){
                    $pay = new Stickerpay();
                    $pay->name = "Sticker". $i ;
                    $pay->sticker_id = $id;
                    // date('YmdHis')}<
                    $sticker = $pay->name;

                    
                    $image = $request->file('pays');
                    // $destination = public_path('Pack'.$id.'/'.$sticker);
                    // $destinationPack = public_path('Pack'.$id.'/');

                    // if(file_exists($destinationPack)){
                    //         unlink($destinationPack);
                    // }

                    $ruteSaveImg = 'Pack'.$id.'/';
                    $imageSticker = "Sticker" . $i . "." . $image[0]->getClientOriginalExtension();
                    // dd($image);
                    $image[$numSticker]->move($ruteSaveImg, $imageSticker);
                    // dd($stickerspay);
                    // $stickerspay['name'] = "$imageSticker";
                    // dd("bieeeen");
                    // dd("Noooo");
                    $pay->save();
                    // $pay->update($stickerspay);
                    $i = $i + 1;
                    $numSticker = $numSticker + 1 ;
            }
        } else {
                    unset($sti['tray_image_file']);
        }

        $sticker = Sticker::find($id);
        $stickerpay = new Stickerpay;
        $stickerpays = $stickerpay->where('sticker_id',$id)->get();
        
        return view('stickerpay.edit', compact('sticker'),['stickerpays'=>$stickerpays]);
        // return redirect()->route('stickers.index');
    }

    public function destroy($id)
    {
        //
    }
}
