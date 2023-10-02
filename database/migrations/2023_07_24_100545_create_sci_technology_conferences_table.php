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
        Schema::create('sci_technology_conferences', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->date('date');
            $table->longText('summary');
            $table->string('facilitator');
            $table->string('info_src');
            $table->string('comments');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('sci_technology_conferences');
    }
};
