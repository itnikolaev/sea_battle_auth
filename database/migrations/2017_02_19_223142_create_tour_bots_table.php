<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateTourBotsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('tour_bots', function (Blueprint $table) {
            $table->integer('bot_id');
			$table->integer('tour_id');
			$table->enum('state', ['access','deny'])->default('access');
			$table->timestamp('registered_date')->default(DB::raw('CURRENT_TIMESTAMP ON UPDATE CURRENT_TIMESTAMP'));
			$table->integer('played');
			$table->integer('win');
			$table->integer('lose');
			$table->integer('disconnect');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('tour_bots');
    }
}
