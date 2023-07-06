<?php

use Illuminate\Support\Facades\DB;
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
        Schema::table('categories', function (Blueprint $table) {
            $table->boolean('default')->default(false);
        });

        DB::table('categories')->insert([
            'name' => 'non classé',
            'slug' => 'non-classe',
            'color' => '#206bc4',
            'desc' => 'Catégorie par défaut',
            'image' => 'categories/default.jpg',
            'default' => true
        ]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('categories', function (Blueprint $table) {
            //
        });
    }
};
