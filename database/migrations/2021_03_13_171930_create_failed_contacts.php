<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFailedContacts extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('failed_contacts', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('row');
            $table->string('record');
            $table->json('messages');
            $table->foreignId('file_id')->constrained(); //todo: organize foreign key
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
        Schema::dropIfExists('failed_contacts');
    }
}
