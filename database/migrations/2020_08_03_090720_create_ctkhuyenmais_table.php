<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateCtkhuyenmaisTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('ctkhuyenmais', function (Blueprint $table) {
            $table->id();
            $table->integer('phantramKM');
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('id_khuyenmais');
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
        Schema::dropIfExists('ctkhuyenmais');
    }
}
