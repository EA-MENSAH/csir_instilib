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
        Schema::create('book_monographs', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->string('authors');
            $table->string('year_publication');
            $table->longText('summary');
            $table->string('identifier');
            $table->string('class_no');
            $table->string('accession_no');
            $table->string('publisher');
            $table->string('no_copies');
            $table->string('subject_area');
            $table->string('vol_issue_no');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('book_monographs');
    }
};
