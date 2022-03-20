<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

class Parcel extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('parcels', function (Blueprint $table) {

            $table->string('p_id')->unique();
            $table->string('u_id');
            $table->string('p_address');
            $table->string('p_status');
            $table->string('std_status');
            $table->string('p_type');


            $table->primary('p_id');
            $table->foreign('u_id')->references('u_id')->on('users');
        });
        DB::table('parcels')->insert([
            ['p_id' => 'P01', 'u_id' => 'CB19083', 'p_address' => 'KK2, A-201-02', 'p_status' => 'Collected', 'std_status' => 'Received', 'p_type' => 'Parcel'],
            ['p_id' => 'P02', 'u_id' => 'CB19021', 'p_address' => 'KK2, B-203-04', 'p_status' => 'Collected', 'std_status' => 'Received', 'p_type' => 'Mail'],
            ['p_id' => 'P03', 'u_id' => 'CB19015', 'p_address' => 'KK2, A-108-02', 'p_status' => 'Collected', 'std_status' => 'Received', 'p_type' => 'Parcel'],
            ['p_id' => 'P04', 'u_id' => 'CD20031', 'p_address' => 'KK4, B-200-03', 'p_status' => 'Collected', 'std_status' => 'Received', 'p_type' => 'Mail'],
            ['p_id' => 'P05', 'u_id' => 'CB19090', 'p_address' => 'KK2, B-209-02', 'p_status' => 'Collected', 'std_status' => 'Received', 'p_type' => 'Parcel'],
            ['p_id' => 'P06', 'u_id' => 'CB19052', 'p_address' => 'KK2, A-103-01', 'p_status' => 'Collected', 'std_status' => 'Received', 'p_type' => 'Parcel'],
            ['p_id' => 'P07', 'u_id' => 'CB19022', 'p_address' => 'KK4, B-300-03', 'p_status' => 'Collected', 'std_status' => 'Received', 'p_type' => 'Parcel'],
            ['p_id' => 'P08', 'u_id' => 'CD20001', 'p_address' => 'KK1, A-112-02', 'p_status' => 'Collected', 'std_status' => 'Received', 'p_type' => 'Mail'],
            ['p_id' => 'P09', 'u_id' => 'CD20020', 'p_address' => 'KK4, A-701-01', 'p_status' => 'Collected', 'std_status' => 'Received', 'p_type' => 'Parcel'],
            ['p_id' => 'P10', 'u_id' => 'CD20044', 'p_address' => 'KK2, B-409-02', 'p_status' => 'Collected', 'std_status' => 'Received', 'p_type' => 'Mail'],
            ['p_id' => 'P11', 'u_id' => 'CD20055', 'p_address' => 'KK3, B-109-03', 'p_status' => 'Collected', 'std_status' => 'Received', 'p_type' => 'Parcel'],
            ['p_id' => 'P12', 'u_id' => 'CB19098', 'p_address' => 'KK4, B-303-03', 'p_status' => 'Collected', 'std_status' => 'Received', 'p_type' => 'Parcel'],
            ['p_id' => 'P13', 'u_id' => 'CD20007', 'p_address' => 'KK4, B-503-04', 'p_status' => 'Collected', 'std_status' => 'Received', 'p_type' => 'Parcel'],
            ['p_id' => 'P14', 'u_id' => 'CD20010', 'p_address' => 'KK2, B-809-02', 'p_status' => 'Collected', 'std_status' => 'Received', 'p_type' => 'Parcel'],
            ['p_id' => 'P15', 'u_id' => 'CD20010', 'p_address' => 'KK2, B-809-02', 'p_status' => 'Collected', 'std_status' => 'Received', 'p_type' => 'Parcel'],
            ['p_id' => 'P16', 'u_id' => 'CB19022', 'p_address' => 'KK4, B-300-03', 'p_status' => 'Collected', 'std_status' => 'Received', 'p_type' => 'Parcel'],
            ['p_id' => 'P17', 'u_id' => 'CB19098', 'p_address' => 'KK4, B-303-03', 'p_status' => 'Collected', 'std_status' => 'Received', 'p_type' => 'Parcel'],
            ['p_id' => 'P18', 'u_id' => 'CB19015', 'p_address' => 'KK2, A-108-02', 'p_status' => 'Collected', 'std_status' => 'Received', 'p_type' => 'Mail'],
            ['p_id' => 'P19', 'u_id' => 'CB19052', 'p_address' => 'KK2, A-103-01', 'p_status' => 'Collected', 'std_status' => 'Received', 'p_type' => 'Parcel'],
            ['p_id' => 'P20', 'u_id' => 'CB19090', 'p_address' => 'KK2, B-209-02', 'p_status' => 'Collected', 'std_status' => 'Received', 'p_type' => 'Parcel'],
            ['p_id' => 'P21', 'u_id' => 'CB19052', 'p_address' => 'KK2, A-103-01', 'p_status' => 'Collected', 'std_status' => 'Received', 'p_type' => 'Parcel'],
            ['p_id' => 'P22', 'u_id' => 'CB19022', 'p_address' => 'KK4, B-300-03', 'p_status' => 'Collected', 'std_status' => 'Received', 'p_type' => 'Mail'],
            ['p_id' => 'P23', 'u_id' => 'CB19098', 'p_address' => 'KK4, B-303-03', 'p_status' => 'Collected', 'std_status' => 'Received', 'p_type' => 'Mail'],
            ['p_id' => 'P24', 'u_id' => 'CB19015', 'p_address' => 'KK2, A-108-02', 'p_status' => 'Collected', 'std_status' => 'Received', 'p_type' => 'Mail'],
            ['p_id' => 'P25', 'u_id' => 'CB19098', 'p_address' => 'KK4, B-303-03', 'p_status' => 'Collected', 'std_status' => 'Received', 'p_type' => 'Parcel'],
            ['p_id' => 'P26', 'u_id' => 'CB19022', 'p_address' => 'KK4, B-300-03', 'p_status' => 'Collected', 'std_status' => 'Received', 'p_type' => 'Parcel'],
            ['p_id' => 'P27', 'u_id' => 'CB19052', 'p_address' => 'KK2, A-103-01', 'p_status' => 'Collected', 'std_status' => 'Received', 'p_type' => 'Parcel'],
            ['p_id' => 'P28', 'u_id' => 'CB19015', 'p_address' => 'KK2, A-108-02', 'p_status' => 'Collected', 'std_status' => 'Received', 'p_type' => 'Parcel'],
            ['p_id' => 'P29', 'u_id' => 'CB19052', 'p_address' => 'KK2, A-103-01', 'p_status' => 'Collected', 'std_status' => 'Received', 'p_type' => 'Mail'],
            ['p_id' => 'P30', 'u_id' => 'CB19015', 'p_address' => 'KK2, A-108-02', 'p_status' => 'Collected', 'std_status' => 'Ready for Collection', 'p_type' => 'Mail'],
            ['p_id' => 'P31', 'u_id' => 'CB19098', 'p_address' => 'KK4, B-303-03', 'p_status' => 'Collected', 'std_status' => 'Ready for Collection', 'p_type' => 'Mail'],
            ['p_id' => 'P32', 'u_id' => 'CB19022', 'p_address' => 'KK4, B-300-03', 'p_status' => 'Collected', 'std_status' => 'Ready for Collection', 'p_type' => 'Mail'],
            ['p_id' => 'P33', 'u_id' => 'CB19022', 'p_address' => 'KK4, B-300-03', 'p_status' => 'Collected', 'std_status' => 'Pending', 'p_type' => 'Parcel'],
            ['p_id' => 'P34', 'u_id' => 'CB19052', 'p_address' => 'KK2, A-103-01', 'p_status' => 'Collected', 'std_status' => 'Pending', 'p_type' => 'Parcel'],
            ['p_id' => 'P35', 'u_id' => 'CB19098', 'p_address' => 'KK4, B-303-03', 'p_status' => 'Reached', 'std_status' => 'Pending', 'p_type' => 'Parcel'],
            ['p_id' => 'P36', 'u_id' => 'CB19022', 'p_address' => 'KK4, B-300-03', 'p_status' => 'Reached', 'std_status' => 'Pending', 'p_type' => 'Parcel']
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('parcels');
    }
}