<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class ParcelDetails extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcel_details', function (Blueprint $table) {

            $table->string('p_id');
            $table->date('collect_date')->nullable();
            $table->date('receive_date')->nullable();
            $table->date('ready_date')->nullable();
            $table->string('student_receive_date')->nullable();


            $table->foreign('p_id')->references('p_id')->on('parcels');
        });

        DB::table('parcel_details')->insert([
            ['p_id' => 'P01', 'collect_date' => '2021-01-03', 'receive_date' => '2021-01-02', 'ready_date' => '2021-01-04', 'student_receive_date' => '2021-01-07'],
            ['p_id' => 'P02', 'collect_date' => '2021-01-03', 'receive_date' => '2021-01-02', 'ready_date' => '2021-01-03', 'student_receive_date' => '2021-01-05'],
            ['p_id' => 'P03', 'collect_date' => '2021-01-04', 'receive_date' => '2021-01-03', 'ready_date' => '2021-01-07', 'student_receive_date' => '2021-01-08'],
            ['p_id' => 'P04', 'collect_date' => '2021-01-05', 'receive_date' => '2021-01-04', 'ready_date' => '2021-01-06', 'student_receive_date' => '2021-01-07'],
            ['p_id' => 'P05', 'collect_date' => '2021-01-06', 'receive_date' => '2021-01-05', 'ready_date' => '2021-01-07', 'student_receive_date' => '2021-01-08'],
            ['p_id' => 'P06', 'collect_date' => '2021-01-07', 'receive_date' => '2021-01-06', 'ready_date' => '2021-01-11', 'student_receive_date' => '2021-01-12'],
            ['p_id' => 'P07', 'collect_date' => '2021-01-11', 'receive_date' => '2021-01-10', 'ready_date' => '2021-01-12', 'student_receive_date' => '2021-01-13'],
            ['p_id' => 'P08', 'collect_date' => '2021-01-12', 'receive_date' => '2021-01-11', 'ready_date' => '2021-01-13', 'student_receive_date' => '2021-01-14'],
            ['p_id' => 'P09', 'collect_date' => '2021-01-16', 'receive_date' => '2021-01-14', 'ready_date' => '2021-01-17', 'student_receive_date' => '2021-01-18'],
            ['p_id' => 'P10', 'collect_date' => '2021-01-16', 'receive_date' => '2021-01-15', 'ready_date' => '2021-01-17', 'student_receive_date' => '2021-01-18'],
            ['p_id' => 'P11', 'collect_date' => '2021-01-17', 'receive_date' => '2021-01-16', 'ready_date' => '2021-01-18', 'student_receive_date' => '2021-01-20'],
            ['p_id' => 'P12', 'collect_date' => '2021-01-21', 'receive_date' => '2021-01-20', 'ready_date' => '2021-01-22', 'student_receive_date' => '2021-01-24'],
            ['p_id' => 'P13', 'collect_date' => '2021-01-22', 'receive_date' => '2021-01-21', 'ready_date' => '2021-01-23', 'student_receive_date' => '2021-01-24'],
            ['p_id' => 'P14', 'collect_date' => '2021-01-24', 'receive_date' => '2021-01-23', 'ready_date' => '2021-01-25', 'student_receive_date' => '2021-01-28'],
            ['p_id' => 'P15', 'collect_date' => '2021-02-02', 'receive_date' => '2021-02-01', 'ready_date' => '2021-02-03', 'student_receive_date' => '2021-02-06'],
            ['p_id' => 'P16', 'collect_date' => '2021-02-02', 'receive_date' => '2021-02-01', 'ready_date' => '2021-02-04', 'student_receive_date' => '2021-02-05'],
            ['p_id' => 'P17', 'collect_date' => '2021-02-05', 'receive_date' => '2021-02-02', 'ready_date' => '2021-02-07', 'student_receive_date' => '2021-02-09'],
            ['p_id' => 'P18', 'collect_date' => '2021-02-11', 'receive_date' => '2021-02-10', 'ready_date' => '2021-02-11', 'student_receive_date' => '2021-02-12'],
            ['p_id' => 'P19', 'collect_date' => '2021-02-23', 'receive_date' => '2021-02-22', 'ready_date' => '2021-02-25', 'student_receive_date' => '2021-02-27'],
            ['p_id' => 'P20', 'collect_date' => '2021-02-22', 'receive_date' => '2021-02-21', 'ready_date' => '2021-02-23', 'student_receive_date' => '2021-02-23'],
            ['p_id' => 'P21', 'collect_date' => '2021-03-07', 'receive_date' => '2021-03-06', 'ready_date' => '2021-03-11', 'student_receive_date' => '2021-03-12'],
            ['p_id' => 'P22', 'collect_date' => '2021-03-13', 'receive_date' => '2021-03-09', 'ready_date' => '2021-03-14', 'student_receive_date' => '2021-03-18'],
            ['p_id' => 'P23', 'collect_date' => '2021-03-11', 'receive_date' => '2021-03-09', 'ready_date' => '2021-03-13', 'student_receive_date' => '2021-03-15'],
            ['p_id' => 'P24', 'collect_date' => '2021-03-24', 'receive_date' => '2021-03-23', 'ready_date' => '2021-03-30', 'student_receive_date' => '2021-03-31'],
            ['p_id' => 'P25', 'collect_date' => '2021-04-08', 'receive_date' => '2021-04-07', 'ready_date' => '2021-04-12', 'student_receive_date' => '2021-04-16'],
            ['p_id' => 'P26', 'collect_date' => '2021-04-10', 'receive_date' => '2021-04-09', 'ready_date' => '2021-04-11', 'student_receive_date' => '2021-04-12'],
            ['p_id' => 'P27', 'collect_date' => '2021-04-10', 'receive_date' => '2021-04-09', 'ready_date' => '2021-04-11', 'student_receive_date' => '2021-04-12'],
            ['p_id' => 'P28', 'collect_date' => '2021-04-24', 'receive_date' => '2021-04-23', 'ready_date' => '2021-04-25', 'student_receive_date' => '2021-04-27'],
            ['p_id' => 'P29', 'collect_date' => '2021-05-21', 'receive_date' => '2021-05-19', 'ready_date' => '2021-05-23', 'student_receive_date' => '2021-05-27'],
            ['p_id' => 'P30', 'collect_date' => '2021-05-28', 'receive_date' => '2021-05-27', 'ready_date' => '2021-05-29', 'student_receive_date' => NULL],
            ['p_id' => 'P31', 'collect_date' => '2021-05-31', 'receive_date' => '2021-05-28', 'ready_date' => '2021-06-07', 'student_receive_date' => NULL],
            ['p_id' => 'P32', 'collect_date' => '2021-05-31', 'receive_date' => '2021-05-29', 'ready_date' => '2021-06-02', 'student_receive_date' => NULL],
            ['p_id' => 'P33', 'collect_date' => '2021-06-05', 'receive_date' => '2021-06-02', 'ready_date' => NULL, 'student_receive_date' => NULL],
            ['p_id' => 'P34', 'collect_date' => '2021-06-07', 'receive_date' => '2021-06-05', 'ready_date' => NULL, 'student_receive_date' => NULL],
            ['p_id' => 'P35', 'collect_date' => NULL, 'receive_date' => '2021-06-06', 'ready_date' => NULL, 'student_receive_date' => NULL],
            ['p_id' => 'P36', 'collect_date' => NULL, 'receive_date' => '2021-06-06', 'ready_date' => NULL, 'student_receive_date' => NULL]
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parcel_details');
    }
}