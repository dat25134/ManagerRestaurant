<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMathangsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mathangs', function (Blueprint $table) {
            $table->id();
            $table->string('tenmathang');
            $table->double('gianhap');
            $table->date('hansudung');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('id_loaimathangs');
            $table->integer('id_donvitinhs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mathangs');
    }
}
