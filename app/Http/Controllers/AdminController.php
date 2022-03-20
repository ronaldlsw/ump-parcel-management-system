<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Complain;
use Illuminate\Database\Query\JoinClause;
use Illuminate\Support\Facades\DB;
Use Redirect;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function userList()
    {
        $warden = DB::table('users')->where('u_type', '=', 'Resident Warden')->count();
        $student = DB::table('users')->where('u_type', '=', 'Student')->count();
        $officer = DB::table('users')->where('u_type', 'like', 'Pusat Mel Officer%')->count();
        $results = DB::table('users')->select('users.*')->get();
        
        return view('Administration.uList', ['datas' => $results, 'warden' => $warden, 'student' => $student, 'officer' => $officer]);
    }

    public function userReport()
    {
        $kk1r = DB::table('users')->where('u_type', '=', 'Resident Warden')->where('u_college', 'like', 'KK1%')->count();
        $kk1s = DB::table('users')->where('u_type', '=', 'Student')->where('u_college', 'like', 'KK1%')->count();
        $kk2r = DB::table('users')->where('u_type', '=', 'Resident Warden')->where('u_college', 'like', 'KK2%')->count();
        $kk2s = DB::table('users')->where('u_type', '=', 'Student')->where('u_college', 'like', 'KK2%')->count();
        $kk3r = DB::table('users')->where('u_type', '=', 'Resident Warden')->where('u_college', 'like', 'KK3%')->count();
        $kk3s = DB::table('users')->where('u_type', '=', 'Student')->where('u_college', 'like', 'KK3%')->count();
        $kk4r = DB::table('users')->where('u_type', '=', 'Resident Warden')->where('u_college', 'like', 'KK4%')->count();
        $kk4s = DB::table('users')->where('u_type', '=', 'Student')->where('u_college', 'like', 'KK4%')->count();
        $kk5r = DB::table('users')->where('u_type', '=', 'Resident Warden')->where('u_college', 'like', 'KK5%')->count();
        $kk5s = DB::table('users')->where('u_type', '=', 'Student')->where('u_college', 'like', 'KK5%')->count();
        $dhr = DB::table('users')->where('u_type', '=', 'Resident Warden')->where('u_college', 'like', 'DHUAM%')->count();
        $dhs = DB::table('users')->where('u_type', '=', 'Student')->where('u_college', 'like', 'DHUAM%')->count();

        $warden = DB::table('users')->where('u_type', '=', 'Resident Warden')->count();
        $student = DB::table('users')->where('u_type', '=', 'Student')->count();
        $officer = DB::table('users')->where('u_type', 'like', 'Pusat Mel Officer%')->count();

        return view('Administration.uReport', ['kk1r' => $kk1r, 'kk1s' => $kk1s, 'kk2r' => $kk2r, 'kk2s' => $kk2s, 'kk3r' => $kk3r, 'kk3s' => $kk3s, 'kk4r' => $kk4r, 'kk4s' => $kk4s, 'kk5r' => $kk5r, 'kk5s' => $kk5s, 'dhr' => $dhr, 'dhs' => $dhs, 'warden' => $warden, 'student' => $student, 'officer' => $officer]);
    }

    public function newUser()
    {
        return view('Administration.newUser');
    }

    public function userProfile($id)
    {
        $results = DB::table('users')->select('users.*')->where('users.u_id', '=', $id)->get();

        return view('Administration.uProfile', ['datas' => $results]);
    }

    public function updateUser($id)
    {
        $results = DB::table('users')->select('users.*')->where('users.u_id', '=', $id)->get();

        return view('Administration.updateUser', ['datas' => $results]);
    }

    public function delUser($id)
    {
        $com = Complain::where('u_id', '=', $id);
        $com->delete();

        $data = User::find($id);
        $data->delete();

        return Redirect::to('/admin/ul/');
    }

    public function updateUserProfile(request $req, $id)
    {
        $data = User::find($id);
        $data->u_name = $req->u_name;
        $data->email = $req->email;
        $data->u_contact = $req->u_contact;
        $data->u_college = $req->u_rCollege .", ". $req->u_room;
        $data->u_type = $req->u_type;

        $data->save();

        return Redirect::to('/admin/ul/');
    }

    public function insertUserProfile(request $req)
    {
        $det = User::find($req->u_id);

        if(!$det)
        {
            $add = $req->u_rCollege .", ". $req->u_room;
            $name = $req->file('u_pic')->getClientOriginalName();
            $req->file('u_pic')->storeAs('images/', $name);
            $pass = bcrypt($req->password);
            DB::table('users')->insert([
                'u_id' => $req->u_id,
                'u_name' => $req->u_name,
                'u_contact' => $req->u_contact,
                'email' => $req->email,
                'u_college' => $add,
                'u_type' => $req->u_type,
                'password' => $pass,
                'profile_img' => $name
            ]);
        }

        return redirect('/admin/ul');
    }

    public function generateUReportQrCode() 
    {
        $kk1r = DB::table('users')->where('u_type', '=', 'Resident Warden')->where('u_college', 'like', 'KK1%')->count();
        $kk1s = DB::table('users')->where('u_type', '=', 'Student')->where('u_college', 'like', 'KK1%')->count();
        $kk2r = DB::table('users')->where('u_type', '=', 'Resident Warden')->where('u_college', 'like', 'KK2%')->count();
        $kk2s = DB::table('users')->where('u_type', '=', 'Student')->where('u_college', 'like', 'KK2%')->count();
        $kk3r = DB::table('users')->where('u_type', '=', 'Resident Warden')->where('u_college', 'like', 'KK3%')->count();
        $kk3s = DB::table('users')->where('u_type', '=', 'Student')->where('u_college', 'like', 'KK3%')->count();
        $kk4r = DB::table('users')->where('u_type', '=', 'Resident Warden')->where('u_college', 'like', 'KK4%')->count();
        $kk4s = DB::table('users')->where('u_type', '=', 'Student')->where('u_college', 'like', 'KK4%')->count();
        $kk5r = DB::table('users')->where('u_type', '=', 'Resident Warden')->where('u_college', 'like', 'KK5%')->count();
        $kk5s = DB::table('users')->where('u_type', '=', 'Student')->where('u_college', 'like', 'KK5%')->count();
        $dhr = DB::table('users')->where('u_type', '=', 'Resident Warden')->where('u_college', 'like', 'DHUAM%')->count();
        $dhs = DB::table('users')->where('u_type', '=', 'Student')->where('u_college', 'like', 'DHUAM%')->count();
        
        return view('Administration.qr', ['kk1s' => $kk1s, 'kk2s' => $kk2s, 'kk3s' => $kk3s, 'kk4s' => $kk4s, 'kk5s' => $kk5s, 'dhs' => $dhs, 'kk1r' => $kk1r, 'kk2r' => $kk2r, 'kk3r' => $kk3r, 'kk4r' => $kk4r, 'kk5r' => $kk5r, 'dhr' => $dhr]);
    }
}
