<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateMonsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('mons', function (Blueprint $table) {
            $table->id();
            $table->string('tukhoa');
            $table->string('tenmon');
            $table->string('tentienganh');
            $table->double('gia');
            $table->timestamps();
            $table->softDeletes();
            $table->unsignedBigInteger('id_nhommons');
            $table->unsignedBigInteger('id_donvitinhs');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('mons');
    }
}
