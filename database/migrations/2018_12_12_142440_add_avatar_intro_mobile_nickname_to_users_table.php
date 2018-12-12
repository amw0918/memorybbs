<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class AddAvatarIntroMobileNicknameToUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->renameColumn('name','username');
            $table->string('avatar')->nullable()->after('password');
            $table->string('intro')->nullable()->after('password');
            $table->string('mobile')->nullable()->unique()->after('password');
            $table->string('nickname')->nullable()->unique()->after('password');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            //
            $table->dropColumn('avatar');
            $table->dropColumn('intro');
            $table->dropColumn('mobile');
            $table->dropColumn('nickname');
        });
    }
}
