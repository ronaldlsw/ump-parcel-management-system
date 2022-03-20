<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('users', function (Blueprint $table) {

        $table->string('u_id')->unique();
	    $table->string('password');
        $table->string('u_type');
        $table->string('u_name');
        $table->string('email')->unique();
	    $table->string('u_contact');
        $table->string('u_college');
	    $table->timestamp('updated_at')->nullable();
        $table->string('profile_img')->nullable();
        $table->rememberToken();
	    $table->primary('u_id');
        });

        DB::table('users')->insert([
        ['u_id' => 'CB19015', 'u_name' => 'Narresh Naidu A/L Subramaniam', 'u_contact' => '01124092575', 'email' => 'narresh@gmail.com', 'u_college' => 'KK2, A-108-02', 'u_type' => 'Student', 'password' => '$2y$10$9Nkg29zF9QQ.78xv9hWC/u9sScXNc66KlMOum.KofML3qCmiQ3LnS', 'profile_img' => '1.jpg'],
        ['u_id' => 'CB19021', 'u_name' => 'Tan Chee Kin', 'u_contact' => '0145678923', 'email' => 'cheekin@gmail.com', 'u_college' => 'KK4, B-203-04', 'u_type' =>  'Student', 'password' => '$2y$10$7EOe7XSDzASZQfEHIKtWHOggOQs5A5APops25lVdL1UyI7pymRBxa', 'profile_img' => '9.jpg'],
        ['u_id' => 'CB19052', 'u_name' => 'Ronald Lim Sheng Wei', 'u_contact' => '0156789234', 'email' => 'ronald@gmail.com', 'u_college' => 'KK4, A-103-01', 'u_type' => 'Student', 'password' => '$2y$10$7XHTLyG0ufGBmKCV9atVVeby0fJyD215gvfBJhugY02ehb5AC7rme', 'profile_img' => '11.jpg'],
        ['u_id' => 'CB19083', 'u_name' => 'Logadarshan A/L Krishnan', 'u_contact' => '0167892345', 'email' => 'logar@gmail.com', 'u_college' => 'KK2, B-201-02', 'u_type' => 'Student', 'password' => '$2y$10$D3LFoP31936IG/JG7nUYquoB2myiNYPY0QVecDEAErb6XaznFmLua', 'profile_img' => '14.jpg'],
        ['u_id' => 'CB19098', 'u_name' => 'Tan Yi Wee', 'u_contact' => '0123456789', 'email' => 'yiwee@gmail.com', 'u_college' => 'KK4, B-303-03', 'u_type' =>  'Student', 'password' => '$2y$10$G8yo1z8rzWhW40aKN1ze.OUZGAVZzV1bnWqTqZobEVmxV341fkgeO', 'profile_img' => '17.jpg'],
        ['u_id' => 'WD11025', 'u_name' => 'Chew Min Wei', 'u_contact' => '0178923456', 'email' => 'minwe@gmail.com', 'u_college' => 'KK2, B-176-03', 'u_type' => 'Resident Warden', 'password' => '$2y$10$e88FssRmSBmB2OLS9PmF5eFJd2EYx.iBKEhuKKM2v6RRaVlmWB4eC', 'profile_img' => '20.jpg'],
        ['u_id' => 'WD11031', 'u_name' => 'Dhiyaurrahman Bin Danial', 'u_contact' => '0112649867', 'email' => 'dhiya@gmail.com', 'u_college' => 'KK4, A-701-03', 'u_type' => 'Resident Warden', 'password' => '$2y$10$1V8PI1zf1rdX5ufMTg3BYuFuv8oKqGdWRQ0noF7pLVqrq46zg9cxe', 'profile_img' => '22.jpg'],
        ['u_id' => 'WD11046', 'u_name' => 'Luqman Bin Abdul Latif', 'u_contact' => '0165567946', 'email' => 'luqman@gmail.com', 'u_college' => 'KK2, A-118-01', 'u_type' => 'Resident Warden', 'password' => '$2y$10$2yeN67tmE7.KRogHENsPqOY0VHruZ.mDQiS78Sp6yIcNMpztjuBNi', 'profile_img' => '29.jpg'],
        ['u_id' => 'WD11054', 'u_name' => 'Moganesan A/L Veragu', 'u_contact' => '0175564892', 'email' => 'mogan@gmail.com', 'u_college' => 'KK4, B-401-03', 'u_type' => 'Resident Warden', 'password' => '$2y$10$SWDKia48pNTH66rNZK6OGOm8j3uf0GUIsQBq1EKhOdXbNDQ/28svu', 'profile_img' => '30.jpg'],
        ['u_id' => 'WD11057', 'u_name' => 'Darwish Bin Mat Zain', 'u_contact' => '0124698322', 'email' => 'darwish@gmail.com', 'u_college' => 'KK4, A-401-01', 'u_type' => 'Resident Warden', 'password' => '$2y$10$hnb7rkr3G3Te/x0SVswqyeWMD8sJohSn/wmuSD9JnoeKq7jTYtyBi', 'profile_img' => '40.jpg'],
        ['u_id' => 'PM01921', 'u_name' => 'Aiman Fiqri Bin Mohd Fadzli', 'u_contact' => '0169643159', 'email' => 'fiqri@gmail.com', 'u_college' => '-', 'u_type' =>  'Pusat Mel Officer (Admin)', 'password' => '$2y$10$zBOrpQj.iXSgkNPURAkYJedppWiJ96CSjq9rEcmgFeA75WPGNlgIC', 'profile_img' => '43.jpg'],
        ['u_id' => 'PM01926', 'u_name' => 'Kavinraj A/L Shanmugam', 'u_contact' => '0176431863', 'email' => 'kavin@gmail.com', 'u_college' => '-', 'u_type' => 'Pusat Mel Officer', 'password' => '$2y$10$ihWOojV5ZGZPHlpwWCNgHe7HKUArZIobn4M6lL6ivUfko2/z2fRhK', 'profile_img' => '46.jpg'],
        ['u_id' => 'PM01931', 'u_name' => 'Teo Voon Chuan', 'u_contact' => '0111154896', 'email' => 'voonchuan@gmail.com', 'u_college' => '-', 'u_type' => 'Pusat Mel Officer', 'password' => '$2y$10$MwV7mAjDol4xrAZS9/oguexhGC8dpzr5p0XoZnDnGwakN5mzjyyUi', 'profile_img' => '52.jpg'],
        ['u_id' => 'PM01946', 'u_name' => 'Mohd Afiq Bin Mohd Zahar', 'u_contact' => '0192236761', 'email' => 'afiq@gmail.com', 'u_college' => '-', 'u_type' => 'Pusat Mel Officer', 'password' => '$2y$10$VRd7lpAOyxwL/ZRIdehDaOSmAHkVo8ZBphsyGdXX13b7q0Q0w3uD6', 'profile_img' => '57.jpg'],
        ['u_id' => 'PM01965', 'u_name' => 'Afiq Danial Bin Noorazam', 'u_contact' => '0176683435', 'email' => 'danial@gmail.com', 'u_college' => '-', 'u_type' => 'Pusat Mel Officer', 'password' => '$2y$10$yPhpP8dWP9vg2ZrVcw7b9Oc8l971I6mBhSyvbbbYqdROLpZBTdP0S', 'profile_img' => '60.jpg'],
        ['u_id' => 'CB19005', 'u_name' => 'Muhammad Hafiz Adnin Bin Zaharuddin', 'u_contact' => '0198406854', 'email' => 'mhafiz@gmail.com', 'u_college' => 'KK4, A-101-01', 'u_type' => 'Student', 'password' => '$2y$10$Z7kSyv0LFce57NWYDgLU/uoSc6Y/3IjVBDWDhiACskYDVDwp4MDiG', 'profile_img' => '66.jpg'],
        ['u_id' => 'CB19090', 'u_name' => 'Muhammad Hafiz Aiman Bin Muhammad Jafri', 'u_contact' => '0137382453', 'email' => 'hafizj@gmail.com', 'u_college' => 'KK2, B-209-02', 'u_type' => 'Student', 'password' => '$2y$10$ZY/sFEbAGYcXxC/3rvEnEeA7KNDGDmlSkWeAm8NCx9SfA2uDwKk46', 'profile_img' => '73.jpg'],
        ['u_id' => 'CB19022', 'u_name' => 'Muhammad Hafiz Aswad Bin Ahmad Kamal', 'u_contact' => '01118933982', 'email' => 'mha@gmail.com', 'u_college' => 'KK4, B-300-03', 'u_type' => 'Student', 'password' => '$2y$10$3H7xACcqC.DAKhgUXL08l.wo7SVKner3B3OkVkMa6eO74DM5Nhcs6', 'profile_img' => '78.jpg'],
        ['u_id' => 'CD20001', 'u_name' => 'Nur Asyiqin Binti Abu Kassim', 'u_contact' => '01111268024', 'email' => 'asyiqin@gmail.com', 'u_college' => 'KK1, A-112-02', 'u_type' => 'Student', 'password' => '$2y$10$kHsk1GQoDbcPksau9eEayObCBNIkQlKi3HcKHi64UdV7OktZLGMlC', 'profile_img' => '31.jpg'],
        ['u_id' => 'CD20007', 'u_name' => 'Aainal Mustaqim Bin Muhammad Fadzil', 'u_contact' => '0139231541', 'email' => 'AAINAL@gmail.com', 'u_college' => 'KK4, B-503-04', 'u_type' => 'Student', 'password' => '$2y$10$D4uKp8hrSpPWkfj.fXin5uBKws6prZgUqbvH3E8o4/CC6xLoPMx/6', 'profile_img' => '79.jpg'],
        ['u_id' => 'CD20020', 'u_name' => 'Abu Bakar Bin Muhammad', 'u_contact' => '0198610714', 'email' => 'ABUBAKAR@gmail.com', 'u_college' => 'KK4, A-701-01', 'u_type' =>  'Student', 'password' => '$2y$10$aw/XTq0MeYQWabeSaIU.yeva7zaX.oshdqvQwanzbwMZV.EonouAC', 'profile_img' => '85.jpg'],
        ['u_id' => 'CD20010', 'u_name' => 'Abu Bakar Muaz Bin Muhammad Halmi', 'u_contact' => '01123801895', 'email' => 'ABUBAKARMUAZ@gmail.com', 'u_college' => 'KK2, B-809-02', 'u_type' => 'Student', 'password' => '$2y$10$XV777D6HB0w/4Qq1fN/GtuG04Ww5TW7bNcolKX0pDAJ34w0fofVdS', 'profile_img' => '88.jpg'],
        ['u_id' => 'CD20031', 'u_name' => 'Che Ku Muhammad Daniel Aiman Bin Che Ku Mazlan', 'u_contact' => '0123745029', 'email' => 'CHEKU@gmail.com', 'u_college' => 'KK4, B-200-03', 'u_type' => 'Student', 'password' => '$2y$10$gnOlWP5dPUUAMsPNgpB/eeP0wYUsOR5aVKikj.QIF3IApgH4RELkK', 'profile_img' => '89.jpg'],
        ['u_id' => 'CD20044', 'u_name' => 'Daniel A/L Moses', 'u_contact' => '0199104324', 'email' => 'daniel@gmail.com', 'u_college' => 'KK2, B-409-02', 'u_type' => 'Student', 'password' => '$2y$10$qxvG0w2u6lW/3bDPoch4oO0/Jm4pu4isKGyTO7v9N9KGJ7dARiS26', 'profile_img' => '91.jpg'],
        ['u_id' => 'CD20055', 'u_name' => 'Wan Nurul Asyiqin Binti Wan Iskandar', 'u_contact' => '0136907657', 'email' => 'wnasyiqin@gmail.com', 'u_college' => 'KK3, B-109-03', 'u_type' => 'Student', 'password' => '$2y$10$EgptL1EoqN5kaOgAU/x6d.WB5A5ZJZHgq9lRGCgdMvbEZX9m02DBm', 'profile_img' => '60(1).jpg']
            ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('users');
    }
}
