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
        
        Schema::table('treinamento', function (Blueprint $table) {
          $table->foreignId('st_treinamento_id')->after('validade')
          ->constrained('situacao_treinamento');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::create('treinamento', function (Blueprint $table) {
            $table->dropColumn('st_treinamento_id');
          });
    }
};
