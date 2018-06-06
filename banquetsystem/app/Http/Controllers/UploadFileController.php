<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\UploadRequest;
use App\table_layout;
use App\table_amount;
use App\main_page;
use Input;

class UploadFileController extends Controller
{
    //
  
   public function fileUpload(Request $request)

{

    $id = auth()->id();

    $this->validate($request, [

        'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

    ]);


    $image = $request->file('image');

    $input['imagename'] = $image->getClientOriginalName();//.'.'.$image->getClientOriginalExtension();

    $destinationPath = public_path('/uploads');

    $image->move($destinationPath, $input['imagename']);

    //MOVE IMAGE NAME TO DATABASE
    $table_layout = new table_layout;
    $tbl_amt = Input::get('tbl_amt');
    $table_layout->uid = $id;
    $table_layout->table_amount = $tbl_amt;
    $table_layout->layout_filename = $input['imagename'];
    $table_layout->save();

    
    $tbl_amt = Input::get('tbl_amt');
    for($i=1;$i<=$tbl_amt;$i++)
    {
       $table_amount = new table_amount;
       $table_amount->table_num = $i;
       $table_amount->cust_id = $id;
       $table_amount->save(); 
    }

    //$this->postImage->add($input);

    $tbl_info = table_amount::where('cust_id', $id)
                  ->get(); 
     
    return view('insert',['error' => '', 'tbl' => $tbl_info]);

}

public function fileUpload2(Request $request)

{

    $id = auth()->id();

    $this->validate($request, [

        'groom_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        'bride_img' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',

    ]);


    $groom_img = $request->file('groom_img');
    $bride_img = $request->file('bride_img');

    $input['groom_img'] = $groom_img->getClientOriginalName();//.'.'.$image->getClientOriginalExtension();
    $input['bride_img'] = $bride_img->getClientOriginalName();//.'.'.$image->getClientOriginalExtension();

    $destinationPath = public_path('/uploads');

    $groom_img->move($destinationPath, $input['groom_img']);
    $bride_img->move($destinationPath, $input['bride_img']);

    //MOVE IMAGE NAME TO DATABASE
    $groom_name = Input::get('groom_name');
    $bride_name = Input::get('bride_name');
    $wed_location = Input::get('wed_location');
    $wed_embed = Input::get('wed_embed');
    

    $main_page = new main_page;
  
    $main_page->cust_id = $id;
    $main_page->groom_name = $groom_name;
    $main_page->bride_name = $bride_name;
    $main_page->venue = $wed_location;
    $main_page->gmap_embed = $wed_embed;
    $main_page->groom_img = $input['groom_img'];
    $main_page->bride_img = $input['bride_img'];
    $main_page->save();

    //$this->postImage->add($input);


    return view('insert',['error'=>'']);

}
    
    }

