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
        Schema::create('clients', function (Blueprint $table) {
            $table->id()->unique()->primary();
            $table->string('prenom');
            $table->string('nom');
            $table->string('genre');
            $table->string('telephone');
            $table->string('email')->nullable();
            $table->string('photo')->nullable();
            $table->foreignId('properties_id')->unique()->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
           /* $table->foreignId('calendriers_id')->unique()->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade'); */
            $table->foreignId('contrats_id')->unique()->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table(function (Blueprint $table) {
            $table->dropForeign('properties_id');
          //  $table->dropForeign('calendriers_id');
            $table->dropForeign('contrats_id');
        });
        Schema::dropIfExists('clients');
    }
};
