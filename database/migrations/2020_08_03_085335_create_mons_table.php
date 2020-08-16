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
            $table->string('tenmon');
            $table->string('tentienganh')->nullable();
            $table->string('imageURL')->default('images/mons/default.jpg');
            $table->double('gia');
            $table->string('nhommons');
            $table->string('donvitinhs');
            $table->timestamps();
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
        Schema::dropIfExists('mons');
    }
}
