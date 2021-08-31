<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Profile;

class ProfileController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
        echo $request;
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
        // $profile = DB::table('tbl_profile')
        //             ->where('user_id', $id)
        //             ->get()->first();

        // $users = DB::table('');
        // dd($profile);
        $profiles = DB::select("SELECT t1.*, t2.artist_type AS a_type FROM (SELECT * FROM tbl_profile WHERE user_id = $id)t1 LEFT JOIN tbl_artist_type t2 ON t1.artist_type = t2.id");
        $artist_type = DB::select('SELECT * FROM tbl_artist_type');
        foreach($profiles as $row) $profile = $row;
        $pages = 'profile';
        return view('profile', compact('profile', 'artist_type','pages'));
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
        // if(!$request->hide_age) $request->hide_age = "off";
        // if(!$request->collab_status) $request->collab_status = "off";
        // if(!$request->send_mail) $request->send_mail = "off";

        $coordinates = $this->get_lat_long($request->address);

        $result = DB::table('tbl_profile')
                ->where('user_id', $id)
                ->update(['first_name' => $request->firstname,
                        'last_name' => $request->lastname,
                        'bio' => $request->bio,
                        'dob' => $request->dob,
                        'address' => $request->address,
                        'zipcode' => $request->zipcode,
                        'coordinate' => $coordinates,
                        'artist_type' => $request->artist_type,
                        'send_mail' => $request->send_mail,
                        'hide_age' => $request->hide_age,
                        'collab_status' => $request->collab_status,
                        'slack_url' => $request->slack_url,
                        'social_fb' => $request->social_fb,
                        'social_tw' => $request->social_tw,
                        'social_insta' => $request->social_insta,
                        'social_lin' => $request->social_lin,
                        'profile_complete' => $request->profile_complete,
                    ]);
                    
        echo json_encode($result);
        // return back();
        // return redirect('profile/'.$id)->with('success');
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

        $lat = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lat'};
        $long = $json->{'results'}[0]->{'geometry'}->{'location'}->{'lng'};

        return $lat.','.$long;
    }

    public function imageUploadPost(Request $request, $id)
    {
        $request->validate([
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);
  
        $imageName = time().'.'.$request->image->extension();  
            
        $request->image->move(public_path('avatar'), $imageName);

        $path = '/avatar/'.$imageName;
        DB::table('tbl_profile')
        ->where('user_id', $id)
        ->update(['avatar_src' => $path]);
   
        return back()
            ->with('success','You have successfully upload image.')
            ->with('image',$imageName);
   
    }

    public function uploadCropImage(Request $request, $id){

        $folderPath = public_path('photos/');
        $image_parts = explode(";base64,", $request->image);
        $image_type_aux = explode("image/", $image_parts[0]);
        $image_type = $image_type_aux[1];
        $image_base64 = base64_decode($image_parts[1]);
 
        $imageName = uniqid() . '.png';
 
        $imageFullPath = $folderPath.$imageName;

        file_put_contents($imageFullPath, $image_base64);
        
        $img_src = '/photos/'.$imageName;
        DB::table('tbl_profile')
        ->where('user_id', $id)
        ->update(['avatar_src' => $img_src]);

        echo json_encode($img_src);
        // return response()->json(['success'=> $imageFullPath]);
    }

    public function addArtistType(Request $request){
        $new_artist_type = $request->addtype;
        DB::table('tbl_artist_type')->insert(
            ['artist_type' => $new_artist_type, 'status' => 'disapproved']
        );
        echo json_encode('success');
    }
}
