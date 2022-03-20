<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parcel;
use App\Models\User;
use App\Models\Parcel_details;
use Carbon\Carbon;
use stdClass;
use Illuminate\Support\Facades\DB;

class goodsListController extends Controller
{
    public function index()
    {
        $currentid = auth()->user()->u_id;
        error_log($currentid);
        $data = DB::table('parcels')
            ->join('parcel_details', 'parcels.p_id', '=', 'parcel_details.p_id')
            ->join('users', 'parcels.u_id', '=', 'users.u_id')
            ->select('parcel_details.*', 'parcels.*', 'users.*')
            ->where('users.u_id', '=', $currentid)
            ->get();
        $a = 0;
        $date = [];
        foreach ($data as $d) {

            $bc = $d->receive_date;
            $date[$a++] = date('Y-m-d', strtotime("+3 day", strtotime($bc)));
        }
        $b = 0;

        $count = Parcel::count();
        $count1 = Parcel::where('p_status', 'collected')->count();
        $count2 = Parcel::where('p_status', 'reached')->count();
        $count3 = Parcel::where('std_status', 'received')->count();
        $count4 = Parcel::where('std_status', 'ready for collection')->count();
        $count5 = Parcel::where('p_status', 'collected')->where('std_status', 'pending')->count();

        return view('goodsList.index', ['parcels' => $data, 'date' => $date, 'b' => $b], compact('count', 'count1', 'count2', 'count3', 'count4', 'count5'));
    }

    public function create()
    {
        $parcelid = DB::table('parcels')
            ->count() + 1;

        if ($parcelid <= 9) {
            $parcelid = "P0" . $parcelid;
        } else {
            $parcelid = "P" . $parcelid;
        }

        $userData = User::all();

        return view('goodsList.create', ['parcelid' => $parcelid], ['users' => $userData]);
    }


    public function store()
    {
        $parcel = new Parcel();
        $parcel->p_id = request('p_id');
        $parcel->u_id = request('u_id');
        $parcel->p_address = request('p_address');
        $parcel->p_status = request('p_status');
        $parcel->std_status = request('std_status');
        $parcel->p_type = request('p_type');


        error_log($parcel);

        $parcel->save();


        return redirect('/good_list');
    }


    public function parceldestroy($id)
    {

        error_log('Stock Destroying...');
        error_log($id);
        $data = DB::table('parcels')->select('*')->where('p_id', '=', $id);
        $pDet = DB::table('parcel_details')->select('*')->where('p_id', '=', $id);
        //$data = Parcel::find($id);
        $pDet->delete();
        $data->delete();
        return redirect('/Good-list');



        $data->delete();
        return redirect()->back()->with('success', 'Data Deleted');
    }

    public function show($p_id)
    {

        //$data = DB::table('users')->select('*')->leftJoin('parcel', 'u_id', '=', 'parcel.u_id')->where('parcel.p_id', '=', $p_id)->get();

        $data = DB::table('parcels')->select('*')->where('p_id', '=', $p_id)->get();

        $userDataAll = User::all();
        return view('goodsList.show', ['parcels' => $data], ['users' => $userDataAll],);
    }

    public function update()
    {
        error_log("udpating..");

        $p_id = request('p_id');
        $p_status = request('p_status');
        $std_status = request('std_status');
        $new = Carbon::today();
        $new_Date = $new->toDateString();

        $data = DB::table('parcels')
            ->join('parcel_details', 'parcels.p_id', '=', 'parcel_details.p_id')
            ->join('users', 'parcels.u_id', '=', 'users.u_id')
            ->where('parcels.p_id', '=', $p_id)
            ->update(['parcels.p_id' => $p_id, 'parcel_details.p_id' => $p_id, 'parcels.p_status' => $p_status, 'parcels.std_status' => $std_status, 'parcel_details.student_receive_date' => $new_Date]);

        return redirect('/Good-list');
    }

    public function report()
    {
        $currentid = auth()->user()->u_id;
        error_log($currentid);
        $uid = DB::table('parcels')
            ->join('users', 'parcels.u_id', '=', 'users.u_id')
            ->select('users.u_id');


        $months  =  DB::table('parcels')
            ->join('parcel_details', 'parcels.p_id', '=', 'parcel_details.p_id')
            ->join('users', 'parcels.u_id', '=', 'users.u_id')
            ->select('users.u_id', 'receive_date')->select('parcel_details.*', 'parcels.*', 'users.*')->where('users.u_id', '=', $currentid)->where('parcels.std_status', '=', 'Received')->where('receive_date', '>', '2021-01-01')->get()->groupBy(function ($date) {
                return Carbon::parse($date->receive_date)->format('m'); // grouping by months
            })->toArray();
        $monthStore = array();
        for ($i = 0; $i < 12; $i++) {
            $monthStore[$i] = new stdClass;
            $monthStore[$i]->month = 0;
        }
        $a = 0;
        foreach ($months as $key => $value) {
            $monthStore[$a]->month = count($value);
            $a++;
            error_log($a);
        }
        error_log($monthStore[0]->month);



        return view('goodsList.report', ['uid' => $currentid, 'months' => $monthStore]);
    }


    public function qrcode()
    {
        $currentid = auth()->user()->u_id;
        error_log($currentid);
        $uid = DB::table('parcels')
            ->join('users', 'parcels.u_id', '=', 'users.u_id')
            ->select('users.u_id');

        $months  =  DB::table('parcels')
            ->join('parcel_details', 'parcels.p_id', '=', 'parcel_details.p_id')
            ->join('users', 'parcels.u_id', '=', 'users.u_id')
            ->select('users.u_id', 'receive_date')->where('users.u_id', '=', $currentid)->where('parcels.std_status', '=', 'Received')->where('receive_date', '>', '2021-01-01')->get()->groupBy(function ($date) {
                return Carbon::parse($date->receive_date)->format('m'); // grouping by months


            })->toArray();
        $monthStore = array();
        for ($i = 0; $i < 12; $i++) {
            $monthStore[$i] = new stdClass;
            $monthStore[$i]->month = 0;
        }
        $a = 0;
        foreach ($months as $key => $value) {
            $monthStore[$a]->month = count($value);
            $a++;
            error_log($a);
        }
        error_log($monthStore[0]->month);



        return view('goodsList.qrcode',  ['uid' => $currentid, 'months' => $monthStore]);
    }
}
