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
        Schema::create('materials', function (Blueprint $table) {
            $table->string('accession', 20)->unique();

            // 0 -> books, 1 -> periodicals, 2 -> articles
            $table->tinyInteger('material_type');
            $table->string('title');
            $table->string('authors');
            $table->string('publisher', 50)->nullable();
            $table->string('image_url', 100)->nullable();
            $table->string('location')->nullable();
            $table->string('volume', 20)->nullable();
            $table->string('edition', 20)->nullable();
            $table->string('pages', 20); // Pages is string for articles, validate on front end and back for materials
            $table->date('acquired_date')->nullable(); // nullable for articles
            $table->date('date_published')->nullable();
            $table->string('remarks')->nullable();
            $table->year('copyright')->nullable(); // nullable for articles

            // BOOKS            
            $table->string('call_number')->nullable();
            $table->tinyInteger('source_of_fund')->nullable();
            $table->float('price', 2)->nullable();

            // 0 -> available, 1 -> borrowed, 2 -> reserved, 3 -> unavailable
            $table->integer('status')->nullable();
            $table->tinyInteger('inventory_status')->nullable();

            // PERIODICALS
            // 0 -> journal, 1 -> magazine, 2 -> article :: also applicable for articles
            $table->integer('periodical_type')->nullable(); 
            $table->string('language', 20)->nullable();
            $table->string('issue', 30)->nullable();

            // ARTICLES
            $table->string('subject', 100)->nullable();
            $table->text('abstract')->nullable();

            $table->timestamps();

            // indexing and primary keys
            $table->primary('accession');
            $table->index(['material_type', 'status']);
            $table->foreign('location')->references('location_short')->on('locations');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('books');
    }
};