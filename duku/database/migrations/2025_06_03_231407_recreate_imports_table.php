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
        // Drop the existing table if it exists
        Schema::dropIfExists('imports');

        // Create the table with all necessary columns
        Schema::create('imports', function (Blueprint $table) {
            $table->id('Import_Id');
            $table->unsignedBigInteger('Food_Id');
            $table->integer('Import_Quantity');
            $table->date('Import_Date')->default(now());
            $table->timestamps();

            $table->foreign('Food_Id')
                  ->references('Food_Id')
                  ->on('foods')
                  ->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('imports');
    }
};
