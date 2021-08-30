<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sticker;
use App\Models\Tag;
use Illuminate\Support\Facades\Storage;

class StickerController extends Controller
{

    public function __construct(){
        $this->middleware('auth');
    }
    
    public function index()
    {
        $tag = new Tag;
        $tags = $tag->get();
        $stickers = Sticker::paginate(10);
        return view('sticker.index', compact('stickers'), ['tags'=>$tags]);
    }

    public function create()
    {
        return view('sticker.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'publisher' => 'required',
            'description' => 'required',
            'tray_image_file' => 'required|image|mimes:jpeg,png,svg',
            'publisher_email' => 'required',
            'publisher_website' => 'required'
        ]);

        $sticker = $request->all();
       
        if($image = $request->file('tray_image_file')) {
            $ruteSaveImg = 'imagestickerfree/';
            $imageSticker = date('YmdHis'). "." . $image->getClientOriginalExtension();
            $image->move($ruteSaveImg, $imageSticker);
            $sticker['tray_image_file'] = "$imageSticker";
        }
        
        Sticker::create($sticker);
        return redirect('/stickers');
    }

    public function show($id)
    {
        //
    }

    public function edit(Sticker $sticker)
    {
        return view('sticker.edit', compact('sticker'));
    }

    public function update(Request $request, Sticker $sticker)
    {
        $request->validate([
            'name' => 'required',
            'publisher' => 'required',
            'description' => 'required',
            'publisher_email' => 'required',
            'publisher_website' => 'required',
        ]);

        $sti = $request->all();
        
        
        if($image = $request->file('tray_image_file')) {
                $destination = public_path('imagestickerfree/'.$sticker->tray_image_file);
                if(file_exists($destination)){
                        unlink($destination);
                }
            $ruteSaveImg = 'imagestickerfree/';
            // $imageSticker = date('YmdHis'). "." . $image->getClientOriginalExtension();
            $imageSticker = "Sticker" . $sticker->id . "." . $image->getClientOriginalExtension();
            $image->move($ruteSaveImg, $imageSticker);
            $sti['tray_image_file'] = "$imageSticker";
        } else {
            unset($sti['tray_image_file']);
        }
        $sticker->update($sti);
        return redirect()->route('stickers.index');
    }

    public function destroy($id)
    {
        $sticker = Sticker::find($id);
        $sticker->delete();
        return redirect('/stickers');
    }
}
