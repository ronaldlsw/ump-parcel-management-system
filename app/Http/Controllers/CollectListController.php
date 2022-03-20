<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parcel;
use App\Models\User;
use App\Models\Parcel_details;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use stdClass;
use Illuminate\Support\Facades\Auth;

class CollectListController extends Controller 
{
    public function index()
    {
        $add = Auth::user()->u_college;
        $add = substr($add, 0, 3);
        $data = DB::table('parcels')
            ->join('parcel_details','parcels.p_id', '=', 'parcel_details.p_id')
            ->join('users','parcels.u_id','=','users.u_id')
            ->select('parcel_details.*','parcels.*','users.*')
            ->where('parcels.p_status','=','Collected')
            ->where('parcels.p_address', 'like', $add.'%')
            ->get();

            $count = Parcel::count();
            $count1=Parcel::where('p_status','collected')->where('parcels.p_address', 'like', $add.'%')->count();
            $count2=Parcel::where('p_status','reached')->where('parcels.p_address', 'like', $add.'%')->count();
            $count3=Parcel::where('std_status','received')->where('parcels.p_address', 'like', $add.'%')->count();
            $count4=Parcel::where('std_status','ready for collection')->where('parcels.p_address', 'like', $add.'%')->count();
            $count5=Parcel::where('p_status','collected')->where('std_status','pending')->where('parcels.p_address', 'like', $add.'%')->count();

        return view('Collect_list.index', compact('data'),compact('count','count1','count2','count3','count4','count5'));
    }

    public function index1()
    {
        $add = Auth::user()->u_college;
        $add = substr($add, 0, 3);
        $data = DB::table('parcels')
            ->join('parcel_details','parcels.p_id', '=', 'parcel_details.p_id')
            ->join('users','parcels.u_id','=','users.u_id')
            ->select('parcel_details.*','parcels.*','users.*')
            ->where('parcels.p_status','=','reached')
            ->where('parcels.p_address', 'like', $add.'%') //**** */
            ->get();
        
        $count = Parcel::count();
        $count1=Parcel::where('p_status','collected')->where('parcels.p_address', 'like', $add.'%')->count();
        $count2=Parcel::where('p_status','reached')->where('parcels.p_address', 'like', $add.'%')->count();
        
        return view('Collect_list.index1', compact('data'),compact('count','count1','count2'));
    }

    public function create()
    {
        $data = DB::table('parcels')
        ->join('parcel_details','parcels.p_id', '=', 'parcel_details.p_id')
        ->join('users','parcels.p_address','=','users.u_college')
        ->select('parcels.*','parcel_details.*','users.*')
        ->get();
        
        $parcelid = DB::table('parcels','parcel_details')
            ->count() + 1;

        if ($parcelid <= 9) {
            $parcelid = "P0" . $parcelid;
        } else {
            $parcelid = "P" . $parcelid;
        }
        
        $parceldetails = Parcel_details::all();
        $userData = User::all();
        
        return view('Collect_list.create', ['parcelid' => $parcelid], ['users' => $userData], ['parcel_details' => $parceldetails]);
    }

    public function store(Request $request)
    {
        $parcel = new Parcel();
        $details = new Parcel_details();
        $details->collect_date = request('collect_date');
        $parcel->p_id = request('p_id');
        $details->p_id = request('p_id');
        $parcel->u_id = request('u_id');
        $parcel->p_type = request('p_type');
        $parcel->p_address = request('p_address');
        $details->receive_date = request('receive_date');
        $parcel->p_status = request('p_status');
        $details->ready_date = request('ready_date');
        $parcel->std_status = request('std_status');
        $details->student_receive_date = request('student_receive_date');
        
        error_log($parcel);
        error_log($details);

        $parcel->save();
        $details->save();
        return redirect('/Collect_list');
    }


    public function parceldestroy($p_id)
    {
        error_log('Stock Destroying...');
        error_log($p_id);
        $data = DB::table('parcels')
        ->join('parcel_details','parcels.p_id', '=', 'parcel_details.p_id')
        ->where('parcels.p_id',$p_id);

        DB::table('parcel_details')->where('p_id', $p_id)->delete();  
        DB::table('parcels')->where('p_id', $p_id)->delete();  

        $data->delete();
        return redirect()->back()->with('success', 'Data Deleted');
    }

    public function show($p_id)
    {  
        $data = DB::table('parcels')
        ->join('parcel_details','parcels.p_id', '=', 'parcel_details.p_id')
        ->join('users','parcels.u_id','=','users.u_id')
        ->select('parcel_details.*','parcels.*','users.*')
        ->where('parcels.p_id', '=', $p_id)
        ->get();

        return view('Collect_list.show', compact('data'));
    
    }

    public function update()
    {
        error_log("udpating..");
        $collect_date = request('collect_date');
        $p_id = request('p_id');
        $u_id = request('u_id');
        $u_name = request('u_name');
        $p_type = request('p_type');
        $p_status = request('p_status');
        $ready_date = request('ready_date');
        $u_contact = request('u_contact');
        $std_status = request('std_status');
        $student_receive_date = request('student_receive_date');
        
        $data = DB::table('parcels')
        ->join('parcel_details','parcels.p_id', '=', 'parcel_details.p_id')
        ->join('users','parcels.u_id','=','users.u_id')
        ->where('parcels.p_id', '=', $p_id)
        ->update([ 'parcels.p_id'=> $p_id,'parcel_details.p_id'=> $p_id, 'parcel_details.collect_date' => $collect_date,'parcels.u_id'=>$u_id,'users.u_name'=>$u_name,'parcels.p_type'=>$p_type,'parcels.p_status' => $p_status,'parcel_details.ready_date' => $ready_date,'users.u_contact'=>$u_contact, 'parcels.std_status' => $std_status, 'parcel_details.student_receive_date' => $student_receive_date]);
        return redirect('/Collect_list');

    }

    public function new($p_id)
    {
        error_log("udpating..");
        $collect_date = date('Y-m-d');
        $p_status = 'Collected';
        
        $data = DB::table('parcels')
        ->join('parcel_details','parcels.p_id', '=', 'parcel_details.p_id')
        ->where('parcels.p_id', '=', $p_id)
        ->update([ 'parcels.p_id'=> $p_id,'parcel_details.collect_date' => $collect_date,'parcels.p_status' => $p_status]);
        return redirect('/Collect_list');

    }

    public function notified($p_id)
    {
        error_log("udpating..");
        $ready_date = date('Y-m-d');
        $std_status = 'Ready for Collection';

        $data = DB::table('parcels')
        ->join('parcel_details','parcels.p_id', '=', 'parcel_details.p_id')
        ->where('parcels.p_id', '=', $p_id)
        ->update([ 'parcels.p_id'=> $p_id,'parcel_details.ready_date' => $ready_date,'parcels.std_status' => $std_status]);
        return redirect('/Collect_list');

    }

    public function statement()
    {   
        $datas = Parcel::join('users', 'parcels.u_id', '=', 'users.u_id')->groupBy('parcels.u_id')->orderBy('total_count', 'desc')->where('parcels.p_status','=','collected')->select('parcels.u_id', \DB::raw("count(parcels.p_id) as total_count"),\DB::raw("COUNT(CASE WHEN parcels.p_type = 'parcel' THEN 1  END) AS parcel"),\DB::raw("COUNT(CASE WHEN parcels.p_type = 'mail' THEN 1 END) AS mail"))->take(3)->get();       
        error_log($datas);

        $datas1 = Parcel::select(\DB::raw("count(parcels.p_id) as total_count"),\DB::raw("count((CASE WHEN p_status ='collected' THEN 1  END)) as collect"),\DB::raw("COUNT(CASE WHEN p_type = 'parcel'and p_status ='collected' THEN 1  END) AS parcel"),\DB::raw("COUNT(CASE WHEN parcels.p_type = 'mail' and p_status ='collected' THEN 1 END) AS mail"))->get();       
        error_log($datas1);

        $count1=Parcel::where('p_status','collected')->where('p_type','parcel')->count();
        $count2=Parcel::where('p_status','collected')->where('p_type','mail')->count();
        $count3=Parcel::where('p_status','collected')->where('std_status','ready for collection')->count();
        $count4=Parcel::where('p_status','collected')->where('std_status','received')->count();
        $count5=Parcel::where('p_status','collected')->where('std_status','pending')->count();

        $janp=Parcel::join('parcel_details', 'parcels.p_id', '=', 'parcel_details.p_id')->where('parcels.p_status','collected')->where('parcel_details.receive_date', '>', '2021-01-01')->where('parcel_details.receive_date','like','%-01-%')->where('parcels.p_type','parcel')->orderBy('parcel_details.receive_date')->groupBy(DB::raw("MONTHNAME(parcel_details.receive_date)"))->count();
        $janm=Parcel::join('parcel_details', 'parcels.p_id', '=', 'parcel_details.p_id')->where('parcels.p_status','collected')->where('parcel_details.receive_date', '>', '2021-01-01')->where('parcel_details.receive_date','like','%-01-%')->where('parcels.p_type','mail')->groupBy(DB::raw("MONTHNAME(parcel_details.receive_date)"))->count();
          
        $febp=Parcel::join('parcel_details', 'parcels.p_id', '=', 'parcel_details.p_id')->where('parcels.p_status','collected')->where('parcel_details.receive_date', '>', '2021-01-01')->where('parcel_details.receive_date','like','%-02-%')->where('parcels.p_type','parcel')->orderBy('parcel_details.receive_date')->groupBy(DB::raw("MONTHNAME(parcel_details.receive_date)"))->count();
        $febm=Parcel::join('parcel_details', 'parcels.p_id', '=', 'parcel_details.p_id')->where('parcels.p_status','collected')->where('parcel_details.receive_date', '>', '2021-01-01')->where('parcel_details.receive_date','like','%-02-%')->where('parcels.p_type','mail')->groupBy(DB::raw("MONTHNAME(parcel_details.receive_date)"))->count();

        $marp=Parcel::join('parcel_details', 'parcels.p_id', '=', 'parcel_details.p_id')->where('parcels.p_status','collected')->where('parcel_details.receive_date', '>', '2021-01-01')->where('parcel_details.receive_date','like','%-03-%')->where('parcels.p_type','parcel')->orderBy('parcel_details.receive_date')->groupBy(DB::raw("MONTHNAME(parcel_details.receive_date)"))->count();
        $marm=Parcel::join('parcel_details', 'parcels.p_id', '=', 'parcel_details.p_id')->where('parcels.p_status','collected')->where('parcel_details.receive_date', '>', '2021-01-01')->where('parcel_details.receive_date','like','%-03-%')->where('parcels.p_type','mail')->groupBy(DB::raw("MONTHNAME(parcel_details.receive_date)"))->count();
          
        $aprp=Parcel::join('parcel_details', 'parcels.p_id', '=', 'parcel_details.p_id')->where('parcels.p_status','collected')->where('parcel_details.receive_date', '>', '2021-01-01')->where('parcel_details.receive_date','like','%-04-%')->where('parcels.p_type','parcel')->orderBy('parcel_details.receive_date')->groupBy(DB::raw("MONTHNAME(parcel_details.receive_date)"))->count();
        $aprm=Parcel::join('parcel_details', 'parcels.p_id', '=', 'parcel_details.p_id')->where('parcels.p_status','collected')->where('parcel_details.receive_date', '>', '2021-01-01')->where('parcel_details.receive_date','like','%-04-%')->where('parcels.p_type','mail')->groupBy(DB::raw("MONTHNAME(parcel_details.receive_date)"))->count();
        
        $mayp=Parcel::join('parcel_details', 'parcels.p_id', '=', 'parcel_details.p_id')->where('parcels.p_status','collected')->where('parcel_details.receive_date', '>', '2021-01-01')->where('parcel_details.receive_date','like','%-05-%')->where('parcels.p_type','parcel')->orderBy('parcel_details.receive_date')->groupBy(DB::raw("MONTHNAME(parcel_details.receive_date)"))->count();
        $maym=Parcel::join('parcel_details', 'parcels.p_id', '=', 'parcel_details.p_id')->where('parcels.p_status','collected')->where('parcel_details.receive_date', '>', '2021-01-01')->where('parcel_details.receive_date','like','%-05-%')->where('parcels.p_type','mail')->groupBy(DB::raw("MONTHNAME(parcel_details.receive_date)"))->count();
          
        $junp=Parcel::join('parcel_details', 'parcels.p_id', '=', 'parcel_details.p_id')->where('parcels.p_status','collected')->where('parcel_details.receive_date', '>', '2021-01-01')->where('parcel_details.receive_date','like','%-06-%')->where('parcels.p_type','parcel')->orderBy('parcel_details.receive_date')->groupBy(DB::raw("MONTHNAME(parcel_details.receive_date)"))->count();
        $junm=Parcel::join('parcel_details', 'parcels.p_id', '=', 'parcel_details.p_id')->where('parcels.p_status','collected')->where('parcel_details.receive_date', '>', '2021-01-01')->where('parcel_details.receive_date','like','%-06-%')->where('parcels.p_type','mail')->groupBy(DB::raw("MONTHNAME(parcel_details.receive_date)"))->count();

        $julp=Parcel::join('parcel_details', 'parcels.p_id', '=', 'parcel_details.p_id')->where('parcels.p_status','collected')->where('parcel_details.receive_date', '>', '2021-01-01')->where('parcel_details.receive_date','like','%-07-%')->where('parcels.p_type','parcel')->orderBy('parcel_details.receive_date')->groupBy(DB::raw("MONTHNAME(parcel_details.receive_date)"))->count();
        $julm=Parcel::join('parcel_details', 'parcels.p_id', '=', 'parcel_details.p_id')->where('parcels.p_status','collected')->where('parcel_details.receive_date', '>', '2021-01-01')->where('parcel_details.receive_date','like','%-07-%')->where('parcels.p_type','mail')->groupBy(DB::raw("MONTHNAME(parcel_details.receive_date)"))->count();
          
        $augp=Parcel::join('parcel_details', 'parcels.p_id', '=', 'parcel_details.p_id')->where('parcels.p_status','collected')->where('parcel_details.receive_date', '>', '2021-01-01')->where('parcel_details.receive_date','like','%-08-%')->where('parcels.p_type','parcel')->orderBy('parcel_details.receive_date')->groupBy(DB::raw("MONTHNAME(parcel_details.receive_date)"))->count();
        $augm=Parcel::join('parcel_details', 'parcels.p_id', '=', 'parcel_details.p_id')->where('parcels.p_status','collected')->where('parcel_details.receive_date', '>', '2021-01-01')->where('parcel_details.receive_date','like','%-08-%')->where('parcels.p_type','mail')->groupBy(DB::raw("MONTHNAME(parcel_details.receive_date)"))->count();

        $sepp=Parcel::join('parcel_details', 'parcels.p_id', '=', 'parcel_details.p_id')->where('parcels.p_status','collected')->where('parcel_details.receive_date', '>', '2021-01-01')->where('parcel_details.receive_date','like','%-09-%')->where('parcels.p_type','parcel')->orderBy('parcel_details.receive_date')->groupBy(DB::raw("MONTHNAME(parcel_details.receive_date)"))->count();
        $sepm=Parcel::join('parcel_details', 'parcels.p_id', '=', 'parcel_details.p_id')->where('parcels.p_status','collected')->where('parcel_details.receive_date', '>', '2021-01-01')->where('parcel_details.receive_date','like','%-09-%')->where('parcels.p_type','mail')->groupBy(DB::raw("MONTHNAME(parcel_details.receive_date)"))->count();

        $octp=Parcel::join('parcel_details', 'parcels.p_id', '=', 'parcel_details.p_id')->where('parcels.p_status','collected')->where('parcel_details.receive_date', '>', '2021-01-01')->where('parcel_details.receive_date','like','%-10-%')->where('parcels.p_type','parcel')->orderBy('parcel_details.receive_date')->groupBy(DB::raw("MONTHNAME(parcel_details.receive_date)"))->count();
        $octm=Parcel::join('parcel_details', 'parcels.p_id', '=', 'parcel_details.p_id')->where('parcels.p_status','collected')->where('parcel_details.receive_date', '>', '2021-01-01')->where('parcel_details.receive_date','like','%-10-%')->where('parcels.p_type','mail')->groupBy(DB::raw("MONTHNAME(parcel_details.receive_date)"))->count();
          
        $novp=Parcel::join('parcel_details', 'parcels.p_id', '=', 'parcel_details.p_id')->where('parcels.p_status','collected')->where('parcel_details.receive_date', '>', '2021-01-01')->where('parcel_details.receive_date','like','%-11-%')->where('parcels.p_type','parcel')->orderBy('parcel_details.receive_date')->groupBy(DB::raw("MONTHNAME(parcel_details.receive_date)"))->count();
        $novm=Parcel::join('parcel_details', 'parcels.p_id', '=', 'parcel_details.p_id')->where('parcels.p_status','collected')->where('parcel_details.receive_date', '>', '2021-01-01')->where('parcel_details.receive_date','like','%-11-%')->where('parcels.p_type','mail')->groupBy(DB::raw("MONTHNAME(parcel_details.receive_date)"))->count();

        $decp=Parcel::join('parcel_details', 'parcels.p_id', '=', 'parcel_details.p_id')->where('parcels.p_status','collected')->where('parcel_details.receive_date', '>', '2021-01-01')->where('parcel_details.receive_date','like','%-12-%')->where('parcels.p_type','parcel')->orderBy('parcel_details.receive_date')->groupBy(DB::raw("MONTHNAME(parcel_details.receive_date)"))->count();
        $decm=Parcel::join('parcel_details', 'parcels.p_id', '=', 'parcel_details.p_id')->where('parcels.p_status','collected')->where('parcel_details.receive_date', '>', '2021-01-01')->where('parcel_details.receive_date','like','%-12-%')->where('parcels.p_type','mail')->groupBy(DB::raw("MONTHNAME(parcel_details.receive_date)"))->count();

        return view('Collect_list.statement',compact('datas','datas1','count1','count2','count3','count4','count5','janp','janm','febp','febm','marp','marm','aprp','aprm','mayp','maym','junp','junm','julp','julm','augp','augm','sepp','sepm','octp','octm','novp','novm','decp','decm'));
    }

    public function qrcode()
    {   
        $count1=Parcel::where('p_status','collected')->where('p_type','parcel')->count();
        $count2=Parcel::where('p_status','collected')->where('p_type','mail')->count();
        $count3=Parcel::where('p_status','collected')->count();
        $count4=Parcel::count();

        return view('Collect_list.qrcode',compact('count1','count2','count3','count4'));
    }
}