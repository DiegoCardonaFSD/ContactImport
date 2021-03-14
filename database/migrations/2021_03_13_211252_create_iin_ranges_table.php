<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateIinRangesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('iin_ranges', function (Blueprint $table) {
            $table->id();
            $table->string('franchise');
            $table->unsignedInteger('range_from');
            $table->unsignedInteger('range_to');
            $table->unsignedInteger('priority')->default(0);
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
        Schema::dropIfExists('iin_ranges');
    }
}
