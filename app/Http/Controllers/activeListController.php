<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Parcel;
use App\Models\Parcel_details;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use PHPUnit\TextUI\XmlConfiguration\Logging\Junit;
use stdClass;

class activeListController extends Controller
{
    public function admin_updateC($p_id)
    {
        $time = Carbon::now();
        $data = Parcel::find($p_id);
        $data2 = Parcel_details::find($p_id);
        $data->p_status = "Collected";
        $data2->collect_date = $time->toDateString();
        $data->save();
        $data2->save();
        return redirect('/admin/active-list');
    }

    public function admin_index()
    {
        $a = 1;
        $countThings = new stdClass;
        $countThings->total = DB::table('parcels')->count();
        $countThings->sumParcel = DB::table('parcels')->where('p_type', '=', 'Parcel')->count();
        $countThings->sumMail = DB::table('parcels')->where('p_type', '=', 'Mail')->count();
        $countThings->pctParcel = round(($countThings->sumParcel / $countThings->total) * 100);
        $countThings->pctMail = round(($countThings->sumMail / $countThings->total) * 100);
        $data = DB::table('parcels')->join('users', 'parcels.u_id', '=', 'users.u_id')->join('parcel_details', 'parcels.p_id', '=', 'parcel_details.p_id')->select('parcels.*', 'users.*', 'parcel_details.*')->orderBy('parcel_details.receive_date', 'desc')->get();
        return view('active_list.admin.index', ['parcels' => $data, 'countThings' => $countThings, 'a' => $a]);
    }

    public function admin_report()
    {
        $dateData = Carbon::now();
        $countThings = new stdClass;
        $countThings->total = DB::table('parcels')->count();
        $countThings->sumParcel = DB::table('parcels')->where('p_type', '=', 'Parcel')->count();
        $countThings->sumMail = DB::table('parcels')->where('p_type', '=', 'Mail')->count();
        $countThings->pctParcel = round(($countThings->sumParcel / $countThings->total) * 100);
        $countThings->pctMail = round(($countThings->sumMail / $countThings->total) * 100);
        $top3 = Parcel::join('users', 'parcels.u_id', '=', 'users.u_id')->groupBy('parcels.u_id')->orderBy('total_count', 'desc')->select('parcels.u_id', \DB::raw("count(parcels.p_id) as total_count"))->take(3)->get();

        $months  = Parcel_details::select('p_id', 'receive_date')->where('receive_date', 'like', $dateData->year . '%')->get()->groupBy(function ($date) {
            return Carbon::parse($date->receive_date)->format('m');
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
        }
        return view('active_list.admin.report', ['months' => $monthStore, 'datas' => $top3, 'countThings' => $countThings]);
    }

    public function admin_create()
    {
        $parcelid = DB::table('parcels')
            ->count() + 1;

        if ($parcelid <= 9) {
            $parcelid = "P0" . $parcelid;
        } else {
            $parcelid = "P" . $parcelid;
        }

        $userData = User::all();

        return view('active_list.admin.create', ['parcelid' => $parcelid], ['users' => $userData]);
    }


    public function admin_store()
    {
        $parcel = new Parcel();
        $parcel->p_id = request('p_id');
        $parcel->u_id = request('u_id');
        $parcel->p_address = request('p_address');
        $parcel->p_status = request('p_status');
        $parcel->p_type = request('p_type');
        $parcel->std_status = "Pending";
        $time = Carbon::now();
        $pDet = new Parcel_details();
        $pDet->p_id = request('p_id');
        //$pDet->collect_date =
        $pDet->receive_date = request('receiveDate');
        if ($parcel->p_status == "Collected") {
            $pDet->collect_date = request('collectDate');
        }
        $parcel->save();
        $pDet->save();


        return redirect('/admin/active-list');
    }


    public function admin_destroy($id)
    {
        $data = DB::table('parcels')->select('*')->where('p_id', '=', $id);
        $pDet = DB::table('parcel_details')->select('*')->where('p_id', '=', $id);
        $pDet->delete();
        $data->delete();
        return redirect('/admin/active-list');
    }

    public function admin_show($p_id)
    {
        $data = DB::table('parcels')->join('parcel_details', 'parcel_details.p_id', '=', 'parcels.p_id')->select('parcels.*', 'parcel_details.*')->where('parcels.p_id', '=', $p_id)->get();
        $userDataAll = User::all();
        return view('active_list.admin.show', ['parcels' => $data], ['users' => $userDataAll]);
    }

    public function admin_update()
    {
        $p_id = request('p_id');
        $data = DB::table('parcels')->select('*')->where('p_id', '=', $p_id)->first();
        $u_id = request('u_id');
        $p_address = request('p_address');
        $p_status = request('p_status');
        $p_type = request('p_type');
        Parcel::where('p_id', $p_id)->update(['p_id' => $p_id, 'u_id' => $u_id, 'p_address' => $p_address, 'p_status' => $p_status, 'std_status' => $data->std_status, 'p_type' => $p_type]);
        $pDet = DB::table('parcel_details')->select('*')->where('p_id', '=', $p_id);
        $pDet->delete();
        $pDet = new Parcel_details();
        $pDet->p_id = request('p_id');
        $pDet->receive_date = request('receiveDate');
        if ($data->p_status == "Collected") {
            $pDet->collect_date = request('collectDate');
        } else {
            $pDet->collect_date = NULL;
        }
        $pDet->save();
        return redirect('/admin/active-list');
    }
    //-----------------------------------------------------------------------------------------------------------------
    //-----------------------------------------------------------------------------------------------------------------
    //-----------------------------------------------------------------------------------------------------------------
    //-----------------------------------------------------------------------------------------------------------------
    //-----------------------------------------------------------------------------------------------------------------
    public function officer_updateC($p_id)
    {
        $time = Carbon::now();
        $data = Parcel::find($p_id);
        $data2 = Parcel_details::find($p_id);

        $data->p_status = "Collected";
        $data2->collect_date = $time->toDateString();

        $data->save();
        $data2->save();
        return redirect('/officer/active-list');
    }

    public function officer_index()
    {
        $a = 1;
        $countThings = new stdClass;
        $countThings->total = DB::table('parcels')->count();
        $countThings->sumParcel = DB::table('parcels')->where('p_type', '=', 'Parcel')->count();
        $countThings->sumMail = DB::table('parcels')->where('p_type', '=', 'Mail')->count();
        $countThings->pctParcel = round(($countThings->sumParcel / $countThings->total) * 100);
        $countThings->pctMail = round(($countThings->sumMail / $countThings->total) * 100);

        $data = DB::table('parcels')->join('users', 'parcels.u_id', '=', 'users.u_id')->join('parcel_details', 'parcels.p_id', '=', 'parcel_details.p_id')->select('parcels.*', 'users.*', 'parcel_details.*')->orderBy('parcel_details.receive_date', 'desc')->get();
        return view('active_list.officer.index', ['parcels' => $data, 'countThings' => $countThings, 'a' => $a]);
    }

    public function officer_report()
    {
        $dateData = Carbon::now();
        $countThings = new stdClass;
        $countThings->total = DB::table('parcels')->count();
        $countThings->sumParcel = DB::table('parcels')->where('p_type', '=', 'Parcel')->count();
        $countThings->sumMail = DB::table('parcels')->where('p_type', '=', 'Mail')->count();
        $countThings->pctParcel = round(($countThings->sumParcel / $countThings->total) * 100);
        $countThings->pctMail = round(($countThings->sumMail / $countThings->total) * 100);
        $top3 = Parcel::join('users', 'parcels.u_id', '=', 'users.u_id')->groupBy('parcels.u_id')->orderBy('total_count', 'desc')->select('parcels.u_id', \DB::raw("count(parcels.p_id) as total_count"))->take(3)->get();

        $months  = Parcel_details::select('p_id', 'receive_date')->where('receive_date', 'like', $dateData->year . '%')->get()->groupBy(function ($date) {
            return Carbon::parse($date->receive_date)->format('m');
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
        }
        return view('active_list.officer.report', ['months' => $monthStore, 'datas' => $top3, 'countThings' => $countThings]);
    }

    public function officer_create()
    {
        $parcelid = DB::table('parcels')
            ->count() + 1;

        if ($parcelid <= 9) {
            $parcelid = "P0" . $parcelid;
        } else {
            $parcelid = "P" . $parcelid;
        }

        $userData = User::all();

        return view('active_list.officer.create', ['parcelid' => $parcelid], ['users' => $userData]);
    }


    public function officer_store()
    {
        $parcel = new Parcel();
        $parcel->p_id = request('p_id');
        $parcel->u_id = request('u_id');
        $parcel->p_address = request('p_address');
        $parcel->p_status = request('p_status');
        $parcel->p_type = request('p_type');
        $parcel->std_status = "Pending";
        $time = Carbon::now();
        $pDet = new Parcel_details();
        $pDet->p_id = request('p_id');
        $pDet->receive_date = request('receiveDate');
        if ($parcel->p_status == "Collected") {
            $pDet->collect_date = request('collectDate');
        }
        $parcel->save();
        $pDet->save();
        return redirect('/officer/active-list');
    }


    public function officer_destroy($id)
    {
        $data = DB::table('parcels')->select('*')->where('p_id', '=', $id);
        $pDet = DB::table('parcel_details')->select('*')->where('p_id', '=', $id);
        $pDet->delete();
        $data->delete();
        return redirect('/officer/active-list');
    }

    public function officer_show($p_id)
    {

        $data = DB::table('parcels')->join('parcel_details', 'parcel_details.p_id', '=', 'parcels.p_id')->select('parcels.*', 'parcel_details.*')->where('parcels.p_id', '=', $p_id)->get();

        $userDataAll = User::all();
        return view('active_list.officer.show', ['parcels' => $data], ['users' => $userDataAll],);
    }

    public function officer_update()
    {
        $p_id = request('p_id');
        $data = DB::table('parcels')->select('*')->where('p_id', '=', $p_id)->first();
        $u_id = request('u_id');
        $p_address = request('p_address');
        $p_status = request('p_status');
        $p_type = request('p_type');
        Parcel::where('p_id', $p_id)->update(['p_id' => $p_id, 'u_id' => $u_id, 'p_address' => $p_address, 'p_status' => $p_status, 'std_status' => $data->std_status, 'p_type' => $p_type]);
        $pDet = DB::table('parcel_details')->select('*')->where('p_id', '=', $p_id);
        $pDet->delete();
        $pDet = new Parcel_details();
        $pDet->p_id = request('p_id');
        $pDet->receive_date = request('receiveDate');
        if ($data->p_status == "Collected") {
            $pDet->collect_date = request('collectDate');
        } else {
            $pDet->collect_date = NULL;
        }
        $pDet->save();
        return redirect('/officer/active-list');
    }
}