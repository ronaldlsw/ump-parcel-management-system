<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateComplainsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('complains', function (Blueprint $table) {

            $table->string('c_id')->unique();
            $table->string('u_id');
            $table->timestamp('c_date')->nullable();
            $table->string('c_type');
            $table->string('c_desc');
            $table->string('c_status');
            $table->timestamp('updated_at')->nullable();

	        $table->primary('c_id');
            $table->foreign('u_id')->references('u_id')->on('users');
        });
        
        DB::table('complains')->insert([
            ['c_id' => 'CG001', 'u_id' => 'CB19021', 'c_date' => '2021-01-12 12:50:08', 'c_type' => 'Damaged Goods', 'c_desc' => 'Products that are broken', 'c_status' => 'In Investigation'],
            ['c_id' => 'CG002', 'u_id' => 'CB19083', 'c_date' => '2021-01-09 13:22:25', 'c_type' => 'Damaged Goods', 'c_desc' => 'Products that are broken', 'c_status' => 'In Investigation'],
            ['c_id' => 'CG003', 'u_id' => 'CB19015', 'c_date' => '2021-02-15 17:42:57', 'c_type' => 'Damaged Goods', 'c_desc' => 'No item', 'c_status' => 'Resolved'],
            ['c_id' => 'CG004', 'u_id' => 'CB19052', 'c_date' => '2021-03-29 16:33:43', 'c_type' => 'Damaged Goods', 'c_desc' => 'Products that are cracked', 'c_status' => 'In Investigation'],
            ['c_id' => 'CG005', 'u_id' => 'CB19098', 'c_date' => '2021-03-04 18:19:10', 'c_type' => 'Damaged Goods', 'c_desc' => 'Products that are cracked', 'c_status' => 'Resolved'],
            ['c_id' => 'CG006', 'u_id' => 'CB19015', 'c_date' => '2021-03-04 10:37:52', 'c_type' => 'Lost Goods', 'c_desc' => 'Did not received parcel', 'c_status' => 'In Investigation'],
            ['c_id' => 'CG007', 'u_id' => 'CB19015', 'c_date' => '2021-04-04 17:51:37', 'c_type' => 'Lost Goods', 'c_desc' => 'Did not received parcel', 'c_status' => 'In Investigation'],
            ['c_id' => 'CG008', 'u_id' => 'CB19052', 'c_date' => '2021-04-04 20:39:19', 'c_type' => 'Lost Goods', 'c_desc' => 'Parcel empty', 'c_status' => 'Resolved'],
            ['c_id' => 'CG009', 'u_id' => 'CB19098', 'c_date' => '2021-04-07 12:24:42', 'c_type' => 'Lost Goods', 'c_desc' => 'No item', 'c_status' => 'Resolved'],
            ['c_id' => 'CG010', 'u_id' => 'CB19052', 'c_date' => '2021-05-10 16:44:53', 'c_type' => 'Lost Goods', 'c_desc' => 'Parcel empty', 'c_status' => 'Resolved']           
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('complains');
    }
}
