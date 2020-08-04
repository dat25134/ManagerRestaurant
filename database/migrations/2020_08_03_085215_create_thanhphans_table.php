<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateThanhphansTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('thanhphans', function (Blueprint $table) {
            $table->id();
            $table->bigInteger('soluong');
            $table->longText('ghichu');
            $table->timestamps();
            $table->softDeletes();
            $table->integer('id_mons');
            $table->integer('id_mathangs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('thanhphans');
    }
}
