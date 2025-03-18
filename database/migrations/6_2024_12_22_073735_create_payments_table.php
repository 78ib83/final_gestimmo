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
        Schema::create('payments', function (Blueprint $table) {
            $table->id()->unique()->primary()->autoIncrement();
            $table->string('type');
            $table->text('libelle');
            $table->foreignId('properties_id')->nullable()
                ->unique()->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->foreignId('maintenances_id')->nullable()
                ->unique()->constrained()
                ->onUpdate('cascade')
                ->onDelete('cascade');
            $table->string('montant');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table(function (Blueprint $table) {
            $table->dropConstrainedForeignId('properties_id');
            $table->dropConstrainedForeignId('maintenances_id');
        });
        Schema::dropIfExists('payments');
    }
};
