<?php

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        $user1 = new User();
        $user1->name = 'izeedev';
        $user1->email = 'dev.bedeisrael@gmail.com';
        $user1->email_verified_at = Carbon::now();
        $user1->password = Hash::make('iH0SKsyQ7oESEK');
        $user1->role = '1';
        $user1->save();

        $user2 = new User();
        $user2->name = 'Aristide KARBOU';
        $user2->email = 'aristidetiger12@gmail.com';
        $user2->email_verified_at = Carbon::now();
        $user2->password = Hash::make('oEkqhsjhSEK32');
        $user2->role = '1';
        $user2->save();
     
        $user3 = new User();
        $user3->name = 'User';
        $user3->email = 'user@appname.com';
        $user3->email_verified_at = Carbon::now();
        $user3->password = Hash::make('oEkqhsjhSEK32');
        $user3->role = '0';
        $user3->save();

        $user4 = new User();
        $user4->name = 'Broly';
        $user4->email = 'broly@gmail.com';
        $user4->email_verified_at = Carbon::now();
        $user4->password = Hash::make('oEkqhsEK32856');
        $user4->state = 'inactif';
        $user4->save();
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        User::where('name', 'izeedev')->delete();
        User::where('name', 'user')->delete();
    }
};
