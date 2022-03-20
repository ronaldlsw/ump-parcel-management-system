<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\complain;
use App\Models\User;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class complaintListController extends Controller
{
    public function index()
    {
        $id = Auth::user()->u_id;

        $data = DB::table('complains')
           ->join('users','users.u_id','=','complains.u_id')
            ->select('*')
            ->where('users.u_id', '=', $id)
            ->get();
        return view('comp_list.index', ['complains' => $data]);
    }

    public function admin()
    {
        $data = DB::table('complains')
           ->join('users','users.u_id','=','complains.u_id')
            ->select('*')
            //->where('c_status', '=', 'In investigation')
            ->get();

            $count = Complain::count();
            $count1= Complain::where('c_status','Resolved')->count();
            $count2= Complain::where('c_status','In Investigation')->count();
            $count3= Complain::where('c_type','Damaged Goods')->count();
            $count4= Complain::where('c_type','Lost Goods')->count();
            return view('comp_list.admin', ['complains' => $data],compact('count','count1','count2','count3','count4'));
    }

    public function officer()
    {
        $data = DB::table('complains')
           ->join('users','users.u_id','=','complains.u_id')
            ->select('*')
            //->where('c_status', '=', 'In investigation')
            ->get();

            $count = Complain::count();
            $count1= Complain::where('c_status','Resolved')->count();
            $count2= Complain::where('c_status','In Investigation')->count();
            $count3= Complain::where('c_type','Damaged Goods')->count();
            $count4= Complain::where('c_type','Lost Goods')->count();
            return view('comp_list.officer', ['complains' => $data],compact('count','count1','count2','count3','count4'));
    }

    public function create()
    {
        $complaintid = DB::table('complains')
            ->count() + 1;

        if ($complaintid <= 9) {
            $complaintid = "CG00" . $complaintid;
        } else {
            $complaintid = "CG0" . $complaintid;
        }

        $userData = User::all();

        return view('comp_list.create', ['complaintid' => $complaintid], ['users' => $userData]);
    }


    public function store()
    {
        $comp = new  complain();
        $comp->c_id = request('c_id');
        $comp->u_id = request('u_id');
        $comp->c_date = request('c_date');
        $comp->c_type = request('c_type');
        $comp->c_desc = request('c_desc');
        $comp->c_status = request('c_status');
        error_log($comp);

        $comp->save();


        return redirect('/comp_list');
    }


    public function compdestroy($id)
    {
        error_log('Stock Destroying...');
        error_log($id);
        $data = DB::table('complains')->select('*')->where('c_id', '=', $id);
        //$data = comp::find($id);
        $data->delete();
        return redirect('/comp_list');
    }

    public function show($c_id)
    {
        $data = DB::table('complains')->select('*')->where('c_id', '=', $c_id)->get();

        $userDataAll = User::all();
        return view('comp_list.show', ['complains' => $data], ['users' => $userDataAll],);
    }

    public function ashow($c_id)
    {
        $data = DB::table('complains')->select('*')->where('c_id', '=', $c_id)->get();

        $userDataAll = User::all();
        return view('comp_list.ashow', ['complains' => $data], ['users' => $userDataAll],);
    }
    public function oshow($c_id)
    {
        $data = DB::table('complains')->select('*')->where('c_id', '=', $c_id)->get();

        $userDataAll = User::all();
        return view('comp_list.oshow', ['complains' => $data], ['users' => $userDataAll],);
    }
    public function update1()
    {
        error_log("updating..");
        $c_id = request('c_id');
        $u_id = request('u_id');
        $c_date = request('c_date');
        $c_type = request('c_type');
        $c_desc = request('c_desc');
        $c_status = request('c_status');
        Complain::where('c_id', $c_id)->update(['c_id' => $c_id, 'c_status' => $c_status]);
        return redirect('/comp_list/admin');
    }

    public function update2()
    {
        error_log("updating..");
        $c_id = request('c_id');
        $u_id = request('u_id');
        $c_date = request('c_date');
        $c_type = request('c_type');
        $c_desc = request('c_desc');
        $c_status = request('c_status');
        Complain::where('c_id', $c_id)->update(['c_id' => $c_id, 'c_status' => $c_status]);
        return redirect('/comp_list/officer');
    }


    public function update()
    {
        error_log("updating..");
        $c_id = request('c_id');
        $u_id = request('u_id');
        $c_date = request('c_date');
        $c_type = request('c_type');
        $c_desc = request('c_desc');
        $c_status = request('c_status');
        Complain::where('c_id', $c_id)->update(['c_id' => $c_id, 'u_id' => $u_id,'c_date' => $c_date, 'c_type' => $c_type, 'c_desc' => $c_desc, 'c_status' => $c_status]);
        return redirect('/comp_list');
    }
   
   

    public function report() 
    {
       
        $datas = Complain::join('users', 'complains.u_id', '=', 'users.u_id')
        ->select(\DB::raw("DATE_FORMAT(c_date, '%m/%Y') as month"), 
        \DB::raw("count(c_date) as total_count"),
        \DB::raw("COUNT(CASE WHEN complains.c_type = 'Lost Goods' THEN 1  END) AS Lost_Goods"),
        \DB::raw("COUNT(CASE WHEN complains.c_type = 'Damaged Goods' THEN 1 END) AS Damage_Goods"),
        \DB::raw("COUNT(CASE WHEN complains.c_status = 'Resolved' THEN 1  END) AS Resolved"),
        \DB::raw("COUNT(CASE WHEN complains.c_status = 'In investigation' THEN 1 END) AS In_investigation"))
         ->groupby('month')
         ->get(); 
         error_log($datas);

         $count1= Complain::where('c_status','Resolved')->count();
         $count2= Complain::where('c_status','In Investigation')->count();
         $count3= Complain::where('c_type','Damaged Goods')->count();
         $count4= Complain::where('c_type','Lost Goods')->count();

         return view('comp_list.report',compact('datas','count1','count2','count3','count4'));
       
     }

     public function oreport() 
     {
        
         $datas = Complain::join('users', 'complains.u_id', '=', 'users.u_id')
         ->select(\DB::raw("DATE_FORMAT(c_date, '%m/%Y') as month"), 
         \DB::raw("count(c_date) as total_count"),
         \DB::raw("COUNT(CASE WHEN complains.c_type = 'Lost Goods' THEN 1  END) AS Lost_Goods"),
         \DB::raw("COUNT(CASE WHEN complains.c_type = 'Damaged Goods' THEN 1 END) AS Damage_Goods"),
         \DB::raw("COUNT(CASE WHEN complains.c_status = 'Resolved' THEN 1  END) AS Resolved"),
         \DB::raw("COUNT(CASE WHEN complains.c_status = 'In investigation' THEN 1 END) AS In_investigation"))
          ->groupby('month')
          ->get(); 
          error_log($datas);
 
          $count1= Complain::where('c_status','Resolved')->count();
          $count2= Complain::where('c_status','In Investigation')->count();
          $count3= Complain::where('c_type','Damaged Goods')->count();
          $count4= Complain::where('c_type','Lost Goods')->count();
 
          return view('comp_list.oreport',compact('datas','count1','count2','count3','count4'));
        
      }

      public function qrcode()
    {   
         $count1= Complain::where('c_status','Resolved')->count();
          $count2= Complain::where('c_status','In Investigation')->count();
          $count3= Complain::where('c_type','Damaged Goods')->count();
          $count4= Complain::where('c_type','Lost Goods')->count();

        return view('comp_list.qrcode',compact('count1','count2','count3','count4'));
    }
     

}