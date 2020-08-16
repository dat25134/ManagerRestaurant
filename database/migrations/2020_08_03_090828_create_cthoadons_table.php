<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCthoadonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('cthoadons', function (Blueprint $table) {
            $table->id();
            $table->integer('soluong');
            $table->integer('khuyenmai')->nullable();
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('id_hoadons');
            $table->unsignedBigInteger('id_mons');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('cthoadons');
    }
}
