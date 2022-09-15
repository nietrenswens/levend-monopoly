<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('gebouwen', function (Blueprint $table) {
            $table->id();
            $table->string('naam');
            $table->string('uuid')->unique();
            $table->integer('prijs');
            $table->boolean('belasting')->default(false);
            $table->foreignId('user_id')->nullable()->references('id')->on('users')->onDelete('cascade')->constrained();
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
        Schema::dropIfExists('gebouwen');
    }
};
