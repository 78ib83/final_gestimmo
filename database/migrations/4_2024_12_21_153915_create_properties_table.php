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
        Schema::create('properties', function (Blueprint $table) {
            $table->id()->unique()->primary()->autoIncrement();
            $table->string("code");
            $table->string("type");
            $table->text("libelle");
            $table->string("prix");
            $table->string("etat");
            $table->string("photo")->nullable();
            $table->foreignId('addresses_id')->unique()->constrained()
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
            
            $table->dropForeign('addresses_id');
            
        });
        Schema::dropIfExists('properties');
    }
};
