<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sticker;
use App\Models\Stickerpay;

class TaskController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $sticker = Sticker::all();
        $stickerpays = Stickerpay::all();
        // foreach($sticker as $sticker){
        $data = ['success' => true,
                'android_play_store_link' => "",
                'ios_app_store_link' => "",
                'sticker_packs' => [
                    
                                    $sticker,
                                    
                                    // 'name' => $sticker->name,
                                    // 'publisher' => $sticker->publisher,
                                    // 'tray_image_file' => "/imagestickerfree/Sticker".$sticker->id.".png",
                                    // 'publisher_email' => $sticker->publisher_email,
                                    // 'publisher_website' => $sticker->publisher_website,
                                    // 'license_agreement_website' => ""
                                ]
                ];
        // }
        return response()->json($data, 200, []);

        // foreach($sticker as $sticker){
        // }
        //     return json_encode(array(
        //         'status' => 200,
        //         'response' => array(
        //             'android_play_store_link' => "",
        //             'ios_app_store_link' => "",
        //             'sticker_packs' => array(
        //                 'identifier' => $sticker[0]->id
        //                 // 'name' => $sticker->name,
        //                 // 'publisher' => $sticker->publisher,
        //                 // 'tray_image_file' => "/imagestickerfree/Sticker".$sticker->id.".png",
        //                 // 'publisher_email' => $sticker->publisher_email,
        //                 // 'publisher_website' => $sticker->publisher_website,
        //                 // 'license_agreement_website' => ""
        //                 )
        //         )
        //         ));
        
        // return \response($sticker);
        
             
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
    }

    public function show($id)
    {
        $sticker = Sticker::find($id);
        $stickerpay = new Stickerpay;
        $stickerpays = $stickerpay->where('sticker_id',$id)->get();
        $data = ['success' => true,
                'android_play_store_link' => "",
                'ios_app_store_link' => "",
                'sticker_packs' => [
                    'identifier' => $sticker->id,
                        'name' => $sticker->name,
                        'publisher' => $sticker->publisher,
                        'tray_image_file' => "/imagestickerfree/Sticker".$sticker->id.".png",
                        'publisher_email' => $sticker->publisher_email,
                        'publisher_website' => $sticker->publisher_website,
                        'license_agreement_website' => "",
                        'stickers' => $stickerpays
                    ]
                ];
        // }
        return response()->json($data, 200, []);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
