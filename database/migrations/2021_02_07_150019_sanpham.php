<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class Sanpham extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('san_pham', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->bigInteger('loai_san_pham_id')->unsigned();
            $table->string('name');
            $table->text('slug');
            $table->text('hinh_anh');
            $table->boolean('hien_thi')->nullable()->default(true);
            $table->text('mo_ta')->nullable();
            $table->bigInteger('da_ban')->default(0);
            $table->float('gia')->default(0);
            $table->float('giam_gia')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
        Schema::dropIfExists('san_pham');
    }
}
