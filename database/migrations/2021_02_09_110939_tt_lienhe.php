<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class TtLienhe extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //
        Schema::create('tt_lien_he', function (Blueprint $table) {
            $table->id();
            $table->string('ten_cong_ty');
            $table->bigInteger('address_id');
            $table->bigInteger('hotline_id');
            $table->string('email')->unique();
            $table->text('facebook')->nullable();
            $table->text('zalo')->nullable();
            $table->text('twitter')->nullable();
            $table->text('maps')->nullable();
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
        Schema::dropIfExists('tt_lien_he');
    }
}
