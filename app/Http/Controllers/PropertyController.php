<?php

namespace App\Http\Controllers;

use App\Models\Property;
use App\Models\User;
use App\Models\Pref;
use Illuminate\Http\Request;
use Auth;
use Session;

class PropertyController extends Controller
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
        $image = array();
        if ($files = $request->file('image')) {
            foreach ($files as $file) {
                $imageName = md5(rand(1000,10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $imageFullName = $imageName.'.'.$ext;
                $uploadPath ='public/images/';
                $imageURL = $uploadPath.$imageFullName;
                $file->move($uploadPath,$imageFullName);
                $image[] = $imageURL;
            }

        }

        $user = User::select('id')->where('email', Session::get('LoggedUserGmail')->getOriginal('email'))->where('userType','1')->first();
        // dd($user->getOriginal('id'));
        $property = new Property([
            'address1' => $request->get('address1'),
            // 'address2' => $request->get('address2'),
            'city'=> $request->get('city'),
            'state'=> $request->get('state'),
            'zip'=> $request->get('zip'),
            'desc'=> $request->get('desc'),
            'parking'=> $request->get('parking'),
            'images'=> implode('|', $image),
            'pref'=> $request->get('pref'),
            'leaseType'=> $request->get('lease'),
            'maxTenant'=> $request->get('maxTenant'),
            'totRent'=> $request->get('rent'),
            'misc'=> $request->get('misc'),
            'landlordID' => $user->getOriginal('id'),
            'totBed' => $request->get('totBed'),
            'totBath' => $request->get('totBath'),
        ]);
        $property->save();
        $property->id;
        
        $prefArray = $request->get('pref');

        $fArray = array();
        
        // foreach($prefArray as $item) {
        //     echo $item;

        // }
        for ($i=0; $i < count($prefArray) ; $i++) { 
            
            $fArray[$i] = $prefArray[$i];
            echo $fArray[$i];
        }

        // dd($prefArray[0][14]);

        $pref = new Pref([
            'property' => $property->id,
            'student' => $prefArray[0][0],
            'couple' => $prefArray[0][2], 
            'parking' => $prefArray[0][4],
            'smoke' => $prefArray[0][6],
            'utility' => $prefArray[0][8],
            'pet' => $prefArray[0][10],
            'disiblity' => $prefArray[0][12],
            'furnish' => $prefArray[0][14],
        ]);
        $pref->save(); 
        return back()->with('success','Property Added');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function show(Property $property)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function edit(Property $property)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Property $property)
    {

    $image = array();

    $imgPath;

    if($request->file('image')){
        if ($files = $request->file('image')) {
            foreach ($files as $file) {
                $imageName = md5(rand(1000,10000));
                $ext = strtolower($file->getClientOriginalExtension());
                $imageFullName = $imageName.'.'.$ext;
                $uploadPath ='public/images/';
                $imageURL = $uploadPath.$imageFullName;
                $file->move($uploadPath,$imageFullName);
                $image[] = $imageURL;
            }
            $imgPath = implode('|', $image);

        }
    }
    else{
       $imgPath = $request->get('images');
    }


        $p = Property::find($request->get('propertyID'));
            $p->address1 = $request->get('address1');
            // $p->address2= $request->get('address2');
            $p->city= $request->get('city');
            $p->state= $request->get('state');
            $p->zip= $request->get('zip');
            $p->desc= $request->get('desc');
            $p->parking= $request->get('parking');
            $p->images = $imgPath;
            $p->pref= $request->get('pref');
            $p->leaseType= $request->get('lease');
            $p->maxTenant= $request->get('maxTenant');
            $p->totRent= $request->get('rent');
            $p->misc= $request->get('misc');
            $p->landlordID= $request->get('landlordID');
            $p->totBed= $request->get('totBed');
            $p->totBath= $request->get('totBath');

            $p->save();

            $prefArray = $request->get('pref');

            $prefData = Pref::where('property', $request->get('propertyID'))->first();
            $prefData -> student = $prefArray[0][0];
            $prefData -> couple = $prefArray[0][2];
            $prefData -> parking = $prefArray[0][4];
            $prefData -> smoke = $prefArray[0][6];
            $prefData -> utility = $prefArray[0][8];
            $prefData -> pet = $prefArray[0][10];
            $prefData -> disiblity = $prefArray[0][12];
            $prefData -> furnish = $prefArray[0][14];
            // dd($prefData);

            $prefData->save();
            return redirect()->route('landlord.ViewProperty'); 

    }

    public function doFilter(Request $request){
        
        $prop = Property::where('city',$request->get('city'))->get();
        $data = compact('prop');
        return view('tenant.home')->with($data);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Property  $property
     * @return \Illuminate\Http\Response
     */
    public function destroy(Property $property)
    {
        //
    }
}
