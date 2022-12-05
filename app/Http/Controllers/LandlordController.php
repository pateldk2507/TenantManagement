<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Property;
use App\Models\Pref;
use App\Models\Tenant;
use App\Models\Payment;
use App\Models\PropertyRequest;
use App\Mail\PaymentMail;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Hash;
use Auth;
use Session;
use Cookie;
use DB;
use Carbon\Carbon;


class LandlordController extends Controller
{
    public function login(){
        return view('landlord.landlord_login');
    }

    public function viewOverdue(){
        $payment = DB::table('payments')
        ->join('tenants','payments.tenant_id', '=' , 'tenants.id')
        ->join('properties','tenants.property', '=', 'properties.id')
        ->select('payments.id','tenants.fname','tenants.lname','properties.address1','properties.city','payments.rent','payments.dueDate')
        ->where('payments.status','0')->whereDate('payments.dueDate', '<', Carbon::now())->orderBy('payments.updated_at', 'DESC')->get();
        // dd($payment);
        $pay = compact('payment');
        return view('landlord.view_overdue')->with($pay);
    }

    public function home(){
        if(Session::has('LoggedUser')){
            $user = Session::get('LoggedUser');
        }else if(Session::has('LoggedUserGmail')){
            $user = Session::get('LoggedUserGmail');
        }else{
            return redirect('/')->withCookie(Cookie::forget('userType'));
        }
        $totRent = Payment::select('rent')->where('recorded_by',$user->getOriginal('id'))->where('rent','>','0')->whereMonth('updated_at',Carbon::now()->month)->sum('rent');
        $overDue = Payment::select('rent')->where('status','0')->whereDate('dueDate', '<', Carbon::now())->sum('rent');
        
        
        $countAvailRoom = DB::table('properties')
        ->selectRaw('properties.id,properties.landlordID, properties.address1,properties.maxtenant , count(tenants.id) as TotTenants, properties.maxTenant - COUNT(tenants.id) as AvailableRooms')
        ->leftJoin('tenants','properties.id','=','tenants.property')
        ->groupBy('tenants.property','properties.id','properties.landlordID', 'properties.address1','properties.maxtenant')
        ->having('properties.landlordID','=', $user->getOriginal('id'))
        ->get();
    
        $getRequest = DB::table('property_requests')
        ->leftJoin('properties','property_requests.pID','=','properties.id')
        ->leftJoin('tenants','property_requests.tID','=','tenants.id')
        ->select('tenants.fname','tenants.lname','properties.address1','property_requests.tID')
        ->where('properties.landlordID','=',$user->getOriginal('id'))
        ->groupBy('property_requests.tID','tenants.fname','tenants.lname','properties.address1')
        ->orderBy('tenants.id')
        ->get();

        // dd($getRequest);

        $chart = DB::table('payments')
        ->select('rent','dueDate','status', 'updated_at' , DB::raw('MONTH(updated_at) month'))
        ->where('recorded_by',$user->getOriginal('id'))
        ->get();
       
        // dd($chart);

        $getMonth = DB::table('payments')
        ->select(DB::raw('MONTHNAME(updated_at) monthname, MONTH(updated_at) month'))
        ->distinct()
        ->orderBy('month','ASC')
        ->get();

        // dd($getMonth);

        
        // dd($countAvailRoom);
        $availRoom = compact('countAvailRoom');
        $reqRooms = compact('getRequest');
        $rent = compact('totRent');
        $totOverDue = compact('overDue');
        return view('landlord.landlord_home')
        ->with($rent)->with($totOverDue)
        ->with($availRoom)->with($reqRooms)
        ->with(compact('getMonth'))
        ->with(compact('chart'));
    }


    public function sendRequest(Request $request){

        
        try {
            $checkID = PropertyRequest::select('pId')->where('pID',$request->get('pID'))->where('tID',$request->get('tID'))->count();
        if($checkID>=1){
            return back()->with('message', 'Already Exist');
        }else{

            $pr = new PropertyRequest([
                'pID' => $request->get('pID'),
                'tID' => $request->get('tID'),
            ]);
            $pr->save();
    
            $prop = Property::all();
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
        } catch (\Throwable $th) {
            return back();
        }
        
        
        // return back()->with($data)->with($data2)->with($getProp);
    }

    public function viewEarnings(){

        $payment = DB::table('payments')
        ->join('tenants','payments.tenant_id', '=' , 'tenants.id')
        ->join('properties','tenants.property', '=', 'properties.id')
        ->select('tenants.fname','tenants.lname','properties.address1','properties.city','payments.rent','payments.updated_at')
        ->where('payments.status','1')->whereMonth('payments.updated_at',Carbon::now()->month)->orderBy('payments.updated_at', 'DESC')->get();
        // dd($payment);
        $pay = compact('payment');
        return view('landlord.view_earnings')->with($pay);
    }

    public function getDataByDate(Request $request){
        // dd($request);
        $from = $request->get('sDate');
        $to = $request->get('eDate');

        $payment = DB::table('payments')
        ->join('tenants','payments.tenant_id', '=' , 'tenants.id')
        ->join('properties','tenants.property', '=', 'properties.id')
        ->select('tenants.fname','tenants.lname','properties.address1','properties.city','payments.rent','payments.updated_at')
        ->where('payments.status','1')->whereBetween('payments.updated_at', [$from, $to])->orderBy('payments.updated_at')->get();
        
        // dd($payment);
        $pay = compact('payment');
        $d1 = compact('from');
        $d2= compact('to');
        return view('landlord.view_earnings')->with($pay)->with($d1)->with($d2);
    }
    public function register(Request $request){
        $request -> validate(
            [
                'fname' => 'required',
                'lname' => 'required',
                'email' => 'required|email',
                'phone' => 'required',
                'gender' => 'required|in:1,0,X',
                'password' => 'required|confirmed',
                'password_confirmation' => 'required',
            ]);
    

        $countEmail = User::where('email', $request->input('email'))->where('userType',$request->get('userType'))->count();
        $countPhone = User::where('phone', $request->input('phone'))->where('userType',$request->get('userType'))->count();
        // return view('landlord.register');

        auth()->logout();
        Session::forget('LoggedUser');
        Session::forget('LoggedUserGmail');
        Session::flush();

        if($countEmail == 0 && $countPhone == 0){
            $user = new User;
            $user->name = $request->input('fname') . " " . $request->input('lname'); 
            $user->email = $request->input('email');
            $user->gender = $request->input('gender');
            $user->phone = $request->input('phone');
            $user->userType = $request->get('userType');
            $user->password = Hash::make($request->input('password'));
            $user->save();
            // $request->session()->flash('msg','Account Created succesfully');
            $data = User::select('id','name','email','userType')->where('email','=',$request->input('email'))->where('userType',$request->get('userType'))->first();
            // dd($data);
            Session::put('LoggedUser', $data);
            return redirect()->route('landlord.home');
            }
            else{
                if($countEmail!=0){
                    return "Account already exist under Email " . $request->input('email');
                }else{
                    return "Account already exist under Phone Number " . $request->input('phone');
                }
            }
    }

    public function googleFunction(){
        $user = Session::get('tempUser');
    
        $id = $_COOKIE['userType'];

        $is_user = User::where('email', $user->getEmail())->where('userType','=',$id)->first();
        
        if(!$is_user){
            
            $saveUser = User::create([
                'google_id' => $user->getId(),
                'name' => $user->getName(),
                'email' => $user->getEmail(),
                'imageURL' => $user->getAvatar(),
                'userType' => $id,            
                'password' => Hash::make($user->getName(). "@" . $user->getId())
            ]);

            Session::put('LoggedUserGmail', $saveUser);
        }

        // Auth::loginUsingId($is_user->id);
        if($id=="1"){
            Session::put('LoggedUserGmail', $is_user);
            return redirect()->route('landlord.home')->withCookie(Cookie::forget('userType'));
        }else{
            Session::put('LoggedUserGmail', $is_user);
            $prop = Property::all();
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

    }

    public function AddProperty(){
        return view('landlord.add_property');
    }
    public function ViewProperty(){
        return view('landlord.view_property');
    }
    public function AddTenants(){

        if(Session::has('LoggedUser')){
            $user = Session::get('LoggedUser');
        }else if(Session::has('LoggedUserGmail')){
            $user = Session::get('LoggedUserGmail');
        }else{
            return redirect('/')->withCookie(Cookie::forget('userType'));
        }
        
        $prop = Property::select('id','address1','address2','city','state')->where('landlordID',$user->getOriginal('id'))->get();
        $data = compact('prop');
        return view('landlord.add_tenants')->with($data);
    }

    public function RegTenants(Request $request){

        if (Session::has('LoggedUserGmail')) {
           $reg = Session::get('LoggedUserGmail')->getOriginal('id');
        }elseif(Session::has('LoggedUser')){
            $reg = Session::get('LoggedUser')->getOriginal('id');
        }else{
            return redirect('/')->withCookie(Cookie::forget('userType'));
        }

        $tenant = new Tenant([
        'fname' => $request->get('fname'),
        'lname' => $request->get('lname'),
        'dob' => $request->get('dob'),
        'gender' => $request->get('gender'),
        'email' => $request->get('email'),
        'phone' => $request->get('phone'),
        'property' => $request->get('property'),
        'unit' => $request->get('unit'),
        'room' => $request->get('room'),
        'leaseType' => $request->get('leaseType'),
        'signedDate' => $request->get('signedDate'),
        'regBy' => $reg
        ]);

        $tenant->save();

        return back()->with('success','Tenant Added');

    }

    public function updateTenant(Request $request){

        $tenant = Tenant::find($request->get('tenantID'));

        $tenant->fname = $request->get('fname');
        $tenant->lname = $request->get('lname');
        $tenant->dob = $request->get('dob');
        $tenant->gender = $request->get('gender');
        $tenant->email  = $request->get('email');
        $tenant->phone  = $request->get('phone');
        $tenant->property  = $request->get('property');
        $tenant->unit  = $request->get('unit');
        $tenant->room  = $request->get('room');
        $tenant->leaseType  = $request->get('leaseType');
        $tenant->signedDate  = $request->get('signedDate');
        
        $tenant->save();

        return back()->with('success','Tenant Data Edited');

    }

    public function getTenants(Request $request){
        
        if (Session::has('LoggedUserGmail')) {
            $reg = Session::get('LoggedUserGmail')->getOriginal('id');
         }elseif(Session::has('LoggedUser')){
             $reg = Session::get('LoggedUser')->getOriginal('id');
         }else{
             return redirect('/')->withCookie(Cookie::forget('userType'));
         }

        $propSelected = $request->get('property');
        // dd($propSelected);
        $prop = Property::select('id','address1','address2','city','state')->where('landlordID',$reg)->get()->unique('address1');
        $tenant = Tenant::select('id','fname','lname','property')->whereIn('property',$request->get('property'))->orderBy('fname')->get();
        $data = compact('tenant');
        $data2 = compact('prop');
        $data3 = compact('propSelected');
        return response()->json($tenant);
        return view('landlord.add_payment')->with($data)->with($data2)->with($data3);
    }


    public function AddPayment(Request $request){

        if(Session::has('LoggedUser')){
            $user = Session::get('LoggedUser');
        }else if(Session::has('LoggedUserGmail')){
            $user = Session::get('LoggedUserGmail');
        }else{
            return redirect('/')->withCookie(Cookie::forget('userType'));
        }

        foreach ($request->get('tenant') as $p) {
            $pay = new Payment([
                'tenant_id'=> $p, 
                'recorded_by'=>$user->getOriginal('id'),
                'dueDate' => $request->get('dueDate'),
            ]);
            $pay->save();
            $pay->id;
            $t = Tenant::select('email','rent','fname','lname')->where('id',$p)->first();
            $l = User::select('name','email')->where('userType','1')->where('id',$user->getOriginal('id'))->first();
            $rent = $t->getOriginal('rent');
            $dueDate = $request->get('dueDate');
            $tranId = $pay->id;
            $tName = $t->getOriginal('fname') ." ".$t->getOriginal('lname');
            $tEmail = $t->getOriginal('email');
            $lEmail = $l->getOriginal('email');
            $lName = $l->getOriginal('name');
            Mail::to($t->getOriginal('email'))->send(new PaymentMail($rent,$dueDate,$tranId,$tName,$tEmail,$lName,$lEmail));
        }
        return back()->with('success','Payment Link Sent');
    }

    public function payment(){
        if(Session::has('LoggedUser')){
            $user = Session::get('LoggedUser');
        }else if(Session::has('LoggedUserGmail')){
            $user = Session::get('LoggedUserGmail');
        }else{
            return redirect('/')->withCookie(Cookie::forget('userType'));
        }
        
        $prop = Property::select('id','address1','address2','city','state')->where('landlordID',$user->getOriginal('id'))->get()->unique('address1');
        $tenant = Tenant::select('id','fname','lname', 'property')->where('regBy', $user->getOriginal('id'))->orderBy('fname')->get();
        $propSelected = "";
        $data = compact('prop');
        $data2 = compact('tenant');
        $data3 = compact('propSelected');
        return view('landlord.add_payment')->with($data)->with($data2)->with($data3);
    }

    public function updatePayment(Request $request){
        // dd();
        Payment::where('id',$request->get('tranId'))->update([
            'status' => $request->get('status'),
            'rent' => $request->get('rent'),
        ]);

        if ($request->get('status') == 0) {
            return view('tenant.paymenterror');
        } else {
            return view('tenant.thankyou');
        }
    }

    public function paymentScreen(){
        // $pay = Payment::select('id','tenant_id')
        return view('tenant.payment');
    }

    public function ViewTenants(){
        if (Session::has('LoggedUserGmail')) {
            $reg = Session::get('LoggedUserGmail')->getOriginal('id');
         }elseif(Session::has('LoggedUser')){
             $reg = Session::get('LoggedUser')->getOriginal('id');
         }else{
             return redirect('/')->withCookie(Cookie::forget('userType'));
         }
        $tenants = Tenant::where('regBy', $reg)->get();
        $data = compact('tenants');
        return view('landlord.view_tenants')->with($data);
    }

    public function openRegPage(){
        return view('landlord.register');
    }

    public function EditTenants($id){
        if (Session::has('LoggedUserGmail')) {
            $reg = Session::get('LoggedUserGmail')->getOriginal('id');
         }elseif(Session::has('LoggedUser')){
             $reg = Session::get('LoggedUser')->getOriginal('id');
         }else{
             return redirect('/')->withCookie(Cookie::forget('userType'));
         }

        $tenant = Tenant::where('id',$id)->first();
        $prop = Property::select('id','address1','address2','city','state')->where('landlordID',$reg)->get();
        $data = compact('prop');
        $data2 = compact('tenant');
        return view('landlord.edit_tenants')->with($data)->with($data2);
    }

    public function EditProperty($id){
        // dd($id);
        $prop = Property::where('id',$id)->first();
        $pref= Pref::where('property',$id)->first()->toArray();
        $data = compact('prop');
        $data1 = compact('pref');
        return view('landlord.edit_property')->with($data)->with($data1);
    }

    public function AddAnnouncement(){
        if(Session::has('LoggedUser')){
            $user = Session::get('LoggedUser');
        }else if(Session::has('LoggedUserGmail')){
            $user = Session::get('LoggedUserGmail');
        }else{
            return redirect('/')->withCookie(Cookie::forget('userType'));
        }
        
        $prop = Property::select('id','address1','address2','city','state')->where('landlordID',$user->getOriginal('id'))->get()->unique('address1');
        $data = compact('prop');
        return view('landlord.add_announcement')->with($data);
    }


    public function logout(){
        
        Auth::logout();
        Session::flush();
        return redirect('/')->withCookie(Cookie::forget('userType'));
    }
}
