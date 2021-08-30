<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sticker;
use App\Models\Tag;

class TagController extends Controller
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
        $tag = new Tag;
        $tags = $tag->where('sticker_id',$id)->get();
        
        // dd($tags);
        // return view('tag.edit')->with('sticker',$sticker);
        return view('tag.edit', compact('sticker'),['tags'=>$tags]);
    }

    public function update(Request $request, $id)
    {
        $stickerstags = $request->get('tags');
        $tag = new Tag;
        $tags = $tag->where('sticker_id',$id)->delete();
        // dd($stickerstags);
        foreach($stickerstags as $stickerstag){
                $tag = new Tag();
                $name = $stickerstag;
                $tag->name = $name;
                $tag->sticker_id = $id;
                $tag->save();
                // echo($name);
        }

        return redirect()->route('stickers.index');
    }

    public function destroy($id)
    {
        //
    }
}
