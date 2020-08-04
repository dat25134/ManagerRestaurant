<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateHoadonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('hoadons', function (Blueprint $table) {
            $table->id();
            $table->date('ngaylap');
            $table->time('giovao');
            $table->time('giothanhtoan');
            $table->integer('ca');
            $table->timestamps();
            $table->integer('id_giamgias');
            $table->integer('id_vats');
            $table->integer('id_bans');
            $table->integer('id_users');
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('hoadons');
    }
}
