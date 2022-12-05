<?php

namespace App\Http\Controllers;

use App\Models\Tenant;
use App\Models\Property;
use App\Models\PropertyRequest;
use Illuminate\Http\Request;
use Auth;
use Session;
use DB;


class TenantController extends Controller
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
    }

    public function login(){
        return view('home');
    }

    public function profile(){
        return view('tenant.profile');
    }
    public function home(){
        $prop = Property::all();
       

        // SELECT properties.id,properties.address1,property_requests.pID,property_requests.tID 
        // FROM `properties` left join property_requests 
        // on properties.id = property_requests.pID 
        // WHERE properties.id = property_requests.pID;


        if(Session::has('LoggedUser')){
            $user = Session::get('LoggedUser');
        }else if(Session::has('LoggedUserGmail')){
            $user = Session::get('LoggedUserGmail');
        }else{
            return redirect('/')->withCookie(Cookie::forget('userType'));
        }

        $getRequest = PropertyRequest::select('pID')->where('tID',$user->getOriginal('id'))->get();
        $getProp = compact('getRequest');
        $data2 = compact('user');
        $data = compact('prop');
        return view('tenant.home')->with($data)->with($data2)->with($getProp);
    }
    public function logout(){
        Auth::logout();
        Session::flush();
        return redirect('/');
    }
    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function show(Tenant $tenant)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function edit(Tenant $tenant)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Tenant $tenant)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Tenant  $tenant
     * @return \Illuminate\Http\Response
     */
    public function destroy(Tenant $tenant)
    {
        //
    }
}
