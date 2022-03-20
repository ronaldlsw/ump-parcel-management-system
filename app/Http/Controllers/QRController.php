<?php

namespace App\Http\Controllers;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QRController extends Controller
{
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

    public function simpleQrCode() 
    {

      \QrCode::size(300)->generate('A basic example of QR code!');
       
    }    

    public function colorQrCode() 
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
        
        /* $std = 'Student: KK1: '.$kk1s.', KK2: '.$kk2s.', KK3: '.$kk3s.', KK4: '.$kk4s.', KK5: '.$kk5s.', DHUAM1: '.$dhs;
        $rw = 'Resident Warden: KK1: '.$kk1r.', KK2: '.$kk2r.', KK3: '.$kk3r.', KK4: '.$kk4r.', KK5: '.$kk5r.', DHUAM: '.$dhr;
        error_log($std."\t".$rw);*/

        /*$str = "Resident College\tStudent\t\tResident Warden\r\nKK1\t\t\t".$kk1s."\t\t\t".$kk1r."\nKK2\t\t\t".$kk2s."\t\t\t".$kk2r."\nKK3\t\t\t".$kk3s."\t\t\t".$kk3r."\nKK4\t\t\t".$kk4s."\t\t\t".$kk4r."\nKK5\t\t\t".$kk5s."\t\t\t".$kk5r."\nDHUAM\t\t\t".$dhs."\t\t\t".$dhr;
        strval($str);
        error_log($str);*/

        $kk1 = "KK1     Student: ".$kk1s."  Resident Warden: ".$kk1r;
        $kk2 = "KK2     Student: ".$kk2s."  Resident Warden: ".$kk2r;
        $kk3 = "KK3     Student: ".$kk3s."  Resident Warden: ".$kk3r;
        $kk4 = "KK4     Student: ".$kk4s."  Resident Warden: ".$kk4r;
        $kk5 = "KK5     Student: ".$kk5s."  Resident Warden: ".$kk5r;
        $dhuam = "DHUAM     Student: ".$dhs."  Resident Warden: ".$dhr;



     return \QrCode::size(500)
             ->backgroundColor(255,55,0)
             ->generate($kk1." ;      ".$kk2." ;      ".$kk3." ;      ".$kk4." ;      ".$kk5.";");
       
    }    
    
    public function imageQrCode() 
    {

      $image = \QrCode::format('png')
               ->merge('images/laravel.png', 0.5, true)
               ->size(500)->errorCorrection('H')
               ->generate('A simple example of QR code!');
      return response($image)->header('Content-type','image/png');
       
    }
}
