<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class SearchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() 
    {
        $currentUser = \Auth::user();
        $active = isset($currentUser->active)?$currentUser->active:'off';
        $login_info = isset($currentUser->active)?$currentUser->active:'off';
        $map_artists = DB::select("SELECT t1.*, t2.artist_type AS a_type FROM (SELECT * FROM tbl_profile WHERE collab_status='on' and profile_complete='on')t1 LEFT JOIN tbl_artist_type t2 ON t1.artist_type = t2.id");
        $centerOflocation = "39.774769,-101.305086";
        $ar_type = '1';
        $artist_type = DB::select('SELECT * FROM tbl_artist_type');
        $artists = DB::select("SELECT t1.*, t2.artist_type AS a_type FROM (SELECT * FROM tbl_profile WHERE zipcode = '00000' AND collab_status='on' and profile_complete='on')t1 LEFT JOIN tbl_artist_type t2 ON t1.artist_type = t2.id");
        $pages = 'map';
        $zipcode = '';
        return view('search_map', compact('pages', 'artists', 'artist_type', 'zipcode', 'ar_type', 'centerOflocation', 'login_info', 'map_artists', 'active'));
    }
    
    public function profileDialog(Request $request){

        $image = $request->image_src;
        $user_infos = DB::select("SELECT t3.*, t4.email FROM (SELECT t1.*, t2.artist_type AS a_type FROM (SELECT * FROM tbl_profile WHERE avatar_src = '$image' AND collab_status='on' and profile_complete = 'on')t1 LEFT JOIN tbl_artist_type t2 ON t1.artist_type = t2.id) t3 LEFT JOIN users t4 ON t3.user_id = t4.id");
        foreach($user_infos as $user_info) $user_info = $user_info;
        // dd($user_info);
        return json_encode($user_info);
    }

    public function SearchByLocation(Request $request){
         
        $zipcode = $request->search_address;
        $login_info = $request->login_info;

        $currentUser = \Auth::user();
        $active = isset($currentUser->active)?$currentUser->active:'off';
        
        $ar_type = '1';
        $artist_type = DB::select('SELECT * FROM tbl_artist_type');

        if(is_numeric($zipcode)){
            $artists = DB::select("SELECT t1.*, t2.artist_type AS a_type FROM (SELECT * FROM tbl_profile WHERE zipcode = $zipcode AND collab_status='on' and profile_complete = 'on')t1 LEFT JOIN tbl_artist_type t2 ON t1.artist_type = t2.id");
        }else{

            $addr = explode(',', $zipcode);
            $newAddr = "";

            if(count($addr)>2){
                for($i = 0; $i < count($addr)-2; $i++){
                    $newAddr .= $addr[$i].',';
                }
            }else{
                $newAddr = $zipcode;
            }
            $artists = DB::select("SELECT * FROM (SELECT t1.*, t2.artist_type AS a_type FROM (SELECT * FROM tbl_profile WHERE address LIKE '%$newAddr%')t1 LEFT JOIN tbl_artist_type t2 ON t1.artist_type = t2.id) t3 WHERE collab_status='on' and profile_complete = 'on'");
        }

        if(strlen($zipcode) > 0){
            $centerOflocation = $this->get_lat_long($zipcode);
        }
        else{
            $centerOflocation = "39.774769,-101.305086";
        }
        $map_artists = DB::select("SELECT t1.*, t2.artist_type AS a_type FROM (SELECT * FROM tbl_profile WHERE collab_status='on' and profile_complete = 'on')t1 LEFT JOIN tbl_artist_type t2 ON t1.artist_type = t2.id");
        $pages = 'map';
        return view('search_map', compact('pages', 'artists', 'artist_type', 'zipcode', 'ar_type', 'centerOflocation', 'login_info', 'map_artists', 'active'));
    }

    public function FilterByType(Request $request)
    {
        $zipcode = $request->serchbyzipcode;
        $ar_type = $request->artist_type_for_search;

        $currentUser = \Auth::user();
        $active = isset($currentUser->active)?$currentUser->active:'off';

        $login_info = $request->login_info;

        if(is_numeric($zipcode)){
            if($ar_type == '1'){
                $artists = DB::select("SELECT t1.*, t2.artist_type AS a_type FROM (SELECT * FROM tbl_profile WHERE zipcode = $zipcode AND collab_status='on' and profile_complete = 'on')t1 LEFT JOIN tbl_artist_type t2 ON t1.artist_type = t2.id");
            }else{
                $artists = DB::select("SELECT t1.*, t2.artist_type AS a_type FROM (SELECT * FROM tbl_profile WHERE zipcode = $zipcode AND artist_type = $ar_type AND collab_status='on' and profile_complete = 'on')t1 LEFT JOIN tbl_artist_type t2 ON t1.artist_type = t2.id");
            }
        }else{
            $addr = explode(',', $zipcode);
            $newAddr = "";

            if(count($addr)>2){
                for($i = 0; $i < count($addr)-2; $i++){
                    $newAddr .= $addr[$i].',';
                }
            }else{
                $newAddr = $zipcode;
            }

            if($ar_type == '1'){
                $artists = DB::select("SELECT * FROM (SELECT t1.*, t2.artist_type AS a_type FROM (SELECT * FROM tbl_profile WHERE address LIKE '%$newAddr%')t1 LEFT JOIN tbl_artist_type t2 ON t1.artist_type = t2.id) t3 WHERE collab_status='on' and profile_complete = 'on'");
            }else{
                $artists = DB::select("SELECT * FROM (SELECT t1.*, t2.artist_type AS a_type FROM (SELECT * FROM tbl_profile WHERE address LIKE '%$newAddr%')t1 LEFT JOIN tbl_artist_type t2 ON t1.artist_type = t2.id) t3 WHERE artist_type = $ar_type AND collab_status='on' and profile_complete = 'on'");
            }
        }

        $artist_type = DB::select('SELECT * FROM tbl_artist_type');

        if(strlen($zipcode) > 0){
            $centerOflocation = $this->get_lat_long($zipcode);
        }else{
            $centerOflocation = "39.774769,-101.305086";
        }
        $map_artists = DB::select("SELECT t1.*, t2.artist_type AS a_type FROM (SELECT * FROM tbl_profile WHERE collab_status='on' and profile_complete = 'on')t1 LEFT JOIN tbl_artist_type t2 ON t1.artist_type = t2.id");
        $pages = 'map';
        return view('search_map', compact('pages', 'artists', 'artist_type', 'zipcode', 'ar_type', 'centerOflocation', 'login_info', 'map_artists', 'active'));
    }

    public function AllView(Request $request){
        $currentUser = \Auth::user();
        $active = isset($currentUser->active)?$currentUser->active:'off';

        $artists = DB::select("SELECT t1.*, t2.artist_type AS a_type FROM (SELECT * FROM tbl_profile WHERE collab_status='on' and profile_complete = 'on')t1 LEFT JOIN tbl_artist_type t2 ON t1.artist_type = t2.id");
        $pages = 'map';
        $artist_type = DB::select('SELECT * FROM tbl_artist_type');
        $zipcode = "";
        $ar_type = '1';
        $centerOflocation = "39.774769,-101.305086";
        $login_info = $request->login_info;

        $map_artists = $artists;
        return view('search_map', compact('pages', 'artists', 'artist_type', 'zipcode', 'ar_type', 'centerOflocation', 'login_info', 'map_artists', 'active'));
    }
    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
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

    // function to get  the address
    public function get_lat_long($address){

        $address = str_replace(" ", "+", $address);

        $address = explode(',', $address);

        $str = "";
        for($i = 0; $i < count($address); $i++) $str .= $address[$i];

        // dd($str);
        $apiKey = 'AIzaSyBM9X8u2sBiuXwtbHEyCNBddrpf_s2a2Z8';

        $json=file_get_contents('https://maps.googleapis.com/maps/api/geocode/json?address='.urlencode($str).'&sensor=false&key='.$apiKey);

        $json = json_decode($json);
        

        if($json->status == "ZERO_RESULTS") return '39.774769,-101.305086';
        $lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
        $long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};

        return $lat.','.$long;
    }
}
