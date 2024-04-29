<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('marks', function (Blueprint $table) {
            $table->bigIncrements('id')->unsigned(); 
            $table->string('exam')->nullable();
            $table->string('bangla')->nullable();
            $table->string('english')->nullable();
            $table->string('math')->nullable();
            $table->string('science')->nullable();
            
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
