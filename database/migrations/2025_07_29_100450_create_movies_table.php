<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{

     public function up()
     {
         Schema::create('movies', function (Blueprint $table) {
             $table->id();
             $table->string('title');
             $table->boolean('is_published')->default(false);
             $table->string('poster_url')->nullable();
             $table->timestamps();
         });
     }

    public function down(): void
    {
        Schema::dropIfExists('movies');
    }
};
