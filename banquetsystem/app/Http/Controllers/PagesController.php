<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Input;
use App\guest_list;
use App\User;
use App\table_layout;
use App\table_amount;
use App\main_page;
use App\member_points;
use File;
use DB;

class PagesController extends Controller
{
    //
    public function homePage()
    {
        $id = auth()->id();
        $all_tbl = table_amount::where('cust_id',$id)
                    ->get();

    	return view('insert',['error' => '' , 'tbl' => $all_tbl]);
    }

    

    public function extractAllguest()
    {
        $id = auth()->id();
    	$allGuest = guest_list::where('uid', $id)
                         ->get();
 

    	return view('guest_list',['allguest' => $allGuest]);
    }

     public function extractTblguest()
    {
    	$id = auth()->id();
    	$tblnum = Input::get('tblnum');
    	$attn = Input::get('attn');

    	if($tblnum==' '&&$attn==' ')
    	{
    		$guest_tbl = guest_list::where('uid', $id)
                         ->get();
    	}

        if($attn==''){
    		$guest_tbl = guest_list::where('table_num', $tblnum)
                          ->where('uid', $id)
    					  ->get();

    	}else if($tblnum!=''){
    		$guest_tbl = guest_list::where('table_num', $tblnum)
                         ->where('uid', $id)
    					 ->where('attendance', $attn)
    					 ->get();
    	}else{
    		$guest_tbl = guest_list::where('uid', $id)
                         ->get();
    	}

    	
    	$tblGuest = guest_list::distinct()->where('uid', $id)
                    ->get(['table_num']);
    	

    	//if($tbl_num==''){
    	//	$tbl_num = $tablenum;
    	//}
    	
    				
    	//return $tblGuest;
    	return view('guest_table',['tblguest' => $tblGuest, 'allguest' => $guest_tbl]);
    }

    public function extractTblguest2($tbl_num)
    {
        $id = auth()->id();
        $allGuest = guest_list::where('uid', $id)
                    ->where('table_num', $tbl_num)
                         ->get();
 

        return view('guest_list',['allguest' => $allGuest]);
    }

    public function extractTblstasts()
    {
        $id = auth()->id();
    	$tblGuest = table_amount::distinct()->where('cust_id', $id)
                    ->orderBy('table_num', 'ASC')
    				->get(['table_num']);
			


    	return view('table_statistics',['tblguest' => $tblGuest]);
    }



    public function insertGuest()
    {
        $id = auth()->id();
        $tbl_info = table_amount::where('cust_id', $id)
                  ->get();


    	$guest_name = Input::get('guest_name');
    	$guest_num = Input::get('guest_num');
    	$tbl_num = Input::get('tbl_num');

    	$guest = new guest_list;
        

        $total_guest = guest_list::where('uid', $id)
                        ->where('table_num',$tbl_num)
                        ->sum('guest_amt');  
        $overall = $guest_num + $total_guest;   
        $remain = (10-$total_guest) ;          
                    
        if($total_guest>=10||$overall>10){
            return view('insert',['error' => 'Table full !!! Only '.$remain.' seats remained for table '.$tbl_num.' !!!', 'tbl' => $tbl_info]);
        }else{
           $guest->name = $guest_name;
           $guest->guest_amt = $guest_num;
           $guest->table_num = $tbl_num;
           $guest->uid = $id;
           $guest->save();

           $allGuest = guest_list::where('uid', $id)
                         ->get();
 

        return view('guest_list',['allguest' => $allGuest]); 
        }



    
    }

    public function checkAttn($id)
    {
        $uid = auth()->id();
    	$guestlist = guest_list::find($id);

		$guestlist->attendance = 1;

		$guestlist->save();

		$allGuest = guest_list::where('uid', $uid)
                         ->get();
 

    	return view('guest_list',['allguest' => $allGuest]);
    }

    public function deleteGuest($id)
    {
    	$guestlist = guest_list::find($id);

		$guestlist->delete();

		//$guestlist->save();

		$allGuest = guest_list::all();
 

    	return view('guest_list',['allguest' => $allGuest]);
    }


    public function layoutPage()
    {
    
        return view('table_layout');
    }

    public function table_view()
    {
        $id = auth()->id();
        $tbl_view = table_layout::where('uid', $id)                  
                    ->get();

        return view('table_view',['tbl_view'=>$tbl_view]); 
    }


    public function register()
    {
                                      
        return view('registration');
    }
    

    public function layoutDelete()
    {
        $id = auth()->id();
        $filename = table_layout::select('layout_filename')->where('uid', $id)->get();
        //$destinationPath = public_path('/uploads');
        //File::delete($destinationPath . $filename);
        $deletedLayout = table_layout::where('uid', $id)->delete();
        $deletedAmount = table_amount::where('cust_id', $id)->delete();
        return view('table_layout');
    }

    public function memberPoints()
    {
        $totalmem_arr =  array();
        $occupied_members_arr = array();

        $total_member2 = User::where('acc_type', 'USER')
                  ->where('id','!=',auth()->id())
                  ->get();

        $occupied_members = member_points::pluck('m_id');
                            
        $total_members = User::whereNotIn('id', $occupied_members)
                            ->where('acc_type','!=','ADMIN')
                            ->get();     

        
                  

                           

        return view('member_points',['total_members'=>$total_members, 'total_members2'=>$total_member2]);
    }

    public function memberpointsAdd()
    {
        
        $member_name = Input::get('member_name');
        $member_name2 = Input::get('member_name2');
        $points_alloc = Input::get('points_alloc');
        
        $member_add = new member_points;  
        $member_add->m_id = $member_name;   
        $member_add->um_id = $member_name2;   
        $member_add->m_points = $points_alloc;   
        $member_add->save();
        
        $totalmem_arr =  array();
        $occupied_members_arr = array();

        $total_member2 = User::where('acc_type', 'USER')
                  ->where('id','!=',auth()->id())
                  ->get();

        $occupied_members = member_points::pluck('m_id');
                            
        $total_members = User::whereNotIn('id', $occupied_members)
                            ->where('acc_type','!=','ADMIN')
                            ->get();     

        
                  

                           

        return view('member_points',['total_members'=>$total_members, 'total_members2'=>$total_member2]);

    }

    public function memberpointsPage()
    {
        $arr = array();
        $arr2 = array();
        $arr3 = array();
        $arr4 = array();
        $arr5 = array();
        $arr6 = array();
        $arr7 = array();
        $arr8 = array();
        $arr9 = array();
        $lvl3_mem_arr = array();
        //parent in page
        $lvl_1 = DB::table('users')
                    ->select('users.id','name','email','u_points')
                    ->where('id', auth()->id())
                    ->get();

         //level 1 members m_id       
         $lvl_1_m_id_lvl1 = member_points::select('m_id')->where('um_id', auth()->id())->get();
         array_push($arr8,$lvl_1_m_id_lvl1);
         $arr8_str = implode(",",$arr8);
         $arr8_str = preg_replace("/[^0-9,.]/", "", $arr8_str);

         $arr8_arr = explode(",",$arr8_str);

         //level 1 members looping
        foreach($arr8_arr as $x){
            if(!empty($x)){
         $lvl_1_mem = DB::table('users')
                    ->select('users.id','name','email','m_id','m_points','um_id')
                    ->rightJoin('member_points', 'users.id', '=', 'member_points.m_id')
                    ->where('m_id', $x)
                    ->get(); 
                    array_push($arr,$lvl_1_mem);  
                    }else{

                    }                                      
         }           

         //level 2 members m_id
         foreach($lvl_1_m_id_lvl1 as $a){                                         
        $lvl_2_m_id_lvl2 = member_points::select('m_id')->where('um_id',$a->m_id)->get();
                                                  array_push($arr3,$lvl_2_m_id_lvl2);
                                              
           }                                    
       $arr3_str = implode(",",$arr3);
       $arr3_str = preg_replace("/[^0-9,.]/", "", $arr3_str);

       $arr3_arr = explode(",",$arr3_str);
                                          
       //level 2 members looping
           
        foreach($arr3_arr as $a){
            
               if(!empty($a)){ 
                $lvl_2 = DB::table('users')
                    ->select('users.id','name','email','m_id','m_points','um_id')
                    ->rightJoin('member_points', 'users.id', '=', 'member_points.m_id')
                    ->where('m_id',$a)
                    ->get();

              array_push($arr2,$lvl_2); 
              }else{
                
              }   
              
        } 


        //level 3 members m_id
         foreach($arr3_arr as $a){                                         
        $lvl_3_m_id_lvl3 = member_points::select('m_id')->where('um_id',$a)->get();
                                                  array_push($arr5,$lvl_3_m_id_lvl3);
                                              
           }   
                                            
       $arr5_str = implode(",",$arr5);
       $arr5_str = preg_replace("/[^0-9,.]/", "", $arr5_str);

       $arr5_arr = explode(",",$arr5_str);
                                         
       //level 3 members looping
           
        foreach($arr5_arr as $a){
            if(!empty($a)){ 
                $lvl_3 = DB::table('users')
                    ->select('users.id','name','email','m_id','m_points','um_id')
                    ->rightJoin('member_points', 'users.id', '=', 'member_points.m_id')
                    ->where('m_id',$a)
                    ->get();

              array_push($arr2,$lvl_3); 
              }else{
                
              }     
              
        }


        //level 4 members m_id
         foreach($arr5_arr as $a){                                         
        $lvl_4_m_id_lvl4 = member_points::select('m_id')->where('um_id',$a)->get();
                                                  array_push($arr6,$lvl_4_m_id_lvl4);
                                              
           }   
                                            
       $arr6_str = implode(",",$arr6);
       $arr6_str = preg_replace("/[^0-9,.]/", "", $arr6_str);

       $arr6_arr = explode(",",$arr6_str);
                                         
       //level 4 members looping
           
        foreach($arr6_arr as $a){
            if(!empty($a)){ 
                $lvl_4 = DB::table('users')
                    ->select('users.id','name','email','m_id','m_points','um_id')
                    ->rightJoin('member_points', 'users.id', '=', 'member_points.m_id')
                    ->where('m_id',$a)
                    ->get();

              array_push($arr2,$lvl_4); 
              }else{
                
              }     
              
        }

        //level 5 members m_id
         foreach($arr6_arr as $a){                                         
        $lvl_5_m_id_lvl5 = member_points::select('m_id')->where('um_id',$a)->get();
                                                  array_push($arr7,$lvl_5_m_id_lvl5);
                                              
           }   
                                            
       $arr7_str = implode(",",$arr7);
       $arr7_str = preg_replace("/[^0-9,.]/", "", $arr7_str);

       $arr7_arr = explode(",",$arr7_str);
                                         
       //level 5 members looping
           
        foreach($arr7_arr as $a){
            if(!empty($a)){ 
                $lvl_5 = DB::table('users')
                    ->select('users.id','name','email','m_id','m_points','um_id')
                    ->rightJoin('member_points', 'users.id', '=', 'member_points.m_id')
                    ->where('m_id',$a)
                    ->get();

              array_push($arr2,$lvl_5); 
              }else{
                
              }     
              
        }

        //level 6 members m_id
         foreach($arr7_arr as $a){                                         
        $lvl_6_m_id_lvl6 = member_points::select('m_id')->where('um_id',$a)->get();
                                                  array_push($arr9,$lvl_6_m_id_lvl6);
                                              
           }   
                                            
       $arr9_str = implode(",",$arr9);
       $arr9_str = preg_replace("/[^0-9,.]/", "", $arr9_str);

       $arr9_arr = explode(",",$arr9_str);
                                         
       //level 6 members looping
           
        foreach($arr9_arr as $a){
            if(!empty($a)){ 
                $lvl_6 = DB::table('users')
                    ->select('users.id','name','email','m_id','m_points','um_id')
                    ->rightJoin('member_points', 'users.id', '=', 'member_points.m_id')
                    ->where('m_id',$a)
                    ->get();

              array_push($arr2,$lvl_6); 
              }else{
                
              }     
              
        }
       

        
        //returning variables
        if(!empty($arr) && !empty($arr2) && !empty($lvl3_mem_arr)){
            return view('member_points_page',['lvl_1'=>$lvl_1, 'lvl_1_mem'=>$arr, 'lvl_2'=>$arr2, 'lvl_3'=>$lvl3_mem_arr]);
        }else if(!empty($arr) && !empty($arr2)){
            return view('member_points_page',['lvl_1'=>$lvl_1, 'lvl_1_mem'=>$arr, 'lvl_2'=>$arr2]);
        }else if(!empty($arr)){
            return view('member_points_page',['lvl_1'=>$lvl_1, 'lvl_1_mem'=>$arr]);

        }else{
            return view('member_points_page',['lvl_1'=>$lvl_1]);
        }


        }
       
    
    

}


