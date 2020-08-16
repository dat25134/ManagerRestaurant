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
            $table->dateTime('ngay_gio_lap')->useCurrent();
            $table->time('giothanhtoan')->nullable();
            $table->integer('vats')->default(10);
            $table->double('total')->nullable();
            $table->timestamps();
            $table->unsignedBigInteger('id_bans');
            $table->unsignedBigInteger('id_users');
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
