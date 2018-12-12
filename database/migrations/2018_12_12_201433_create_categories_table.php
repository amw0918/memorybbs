<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateCategoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create(
            'categories',
            function (Blueprint $table) {
                $table->increments('id');
                $table->string('name')->index()->comment('名称');
                $table->text('description')->comment('描述');
                $table->integer('post_count')->default(0)->comment('帖子个数');
                $table->timestamps();

            }
        );

        DB::statement("ALTER TABLE `categories` comment'帖子类别表'"); // 表注释
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('categories');
    }
}
