<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddPermissions extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      DB::table('permissions')->insert(['name' => 'administrator',]);
      DB::table('permissions')->insert(['name' => 'manage users',]);
      DB::table('permissions')->insert(['name' => 'manage roles',]);
      DB::table('permissions')->insert(['name' => 'edit page',]);
      DB::table('permissions')->insert(['name' => 'create invites',]);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
