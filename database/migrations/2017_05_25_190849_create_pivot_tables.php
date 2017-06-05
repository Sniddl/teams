<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePivotTables extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
      Schema::create('permission_role', function (Blueprint $table) {
        $table->integer('permission_id')->unsigned()->index();
        $table->foreign('permission_id')->references('id')->on('permissions')->onDelete('cascade');
        $table->integer('role_id')->unsigned()->index();
        $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        $table->primary(['permission_id', 'role_id']);
      });

      Schema::create('role_user', function (Blueprint $table) {
        $table->integer('role_id')->unsigned()->index();
        $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        $table->integer('user_id')->unsigned()->index();
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->primary(['role_id', 'user_id']);
      });

      Schema::create('role_team', function (Blueprint $table) {
        $table->integer('role_id')->unsigned()->index();
        $table->foreign('role_id')->references('id')->on('roles')->onDelete('cascade');
        $table->integer('team_id')->unsigned()->index();
        $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
        $table->primary(['role_id', 'team_id']);
      });

      Schema::create('team_user', function (Blueprint $table) {
        $table->integer('team_id')->unsigned()->index();
        $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
        $table->integer('user_id')->unsigned()->index();
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->primary(['team_id', 'user_id']);
      });

      Schema::create('setting_user', function (Blueprint $table) {
        $table->integer('setting_id')->unsigned()->index();
        $table->foreign('setting_id')->references('id')->on('settings')->onDelete('cascade');
        $table->integer('user_id')->unsigned()->index();
        $table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');
        $table->primary(['setting_id', 'user_id']);
      });

      Schema::create('setting_team', function (Blueprint $table) {
        $table->integer('setting_id')->unsigned()->index();
        $table->foreign('setting_id')->references('id')->on('settings')->onDelete('cascade');
        $table->integer('team_id')->unsigned()->index();
        $table->foreign('team_id')->references('id')->on('teams')->onDelete('cascade');
        $table->primary(['setting_id', 'user_id']);
      });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('permission_role');
        Schema::dropIfExists('role_user');
        Schema::dropIfExists('role_team');
        Schema::dropIfExists('team_user');
    }
}
