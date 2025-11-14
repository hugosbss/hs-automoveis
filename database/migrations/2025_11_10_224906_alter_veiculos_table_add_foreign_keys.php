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
        if (Schema::hasColumn('veiculos', 'marca')) {
            Schema::table('veiculos', function (Blueprint $table) {
                $table->dropColumn(['marca', 'modelo', 'cor']);
            });
        }

        if (!Schema::hasColumn('veiculos', 'marca_id')) {
            Schema::table('veiculos', function (Blueprint $table) {
                $table->foreignId('marca_id')->after('id')->constrained('marcas')->onDelete('cascade');
            });
        }
        
        if (!Schema::hasColumn('veiculos', 'modelo_id')) {
            Schema::table('veiculos', function (Blueprint $table) {
                $table->foreignId('modelo_id')->after('marca_id')->constrained('modelos')->onDelete('cascade');
            });
        }
        
        if (!Schema::hasColumn('veiculos', 'cor_id')) {
            Schema::table('veiculos', function (Blueprint $table) {
                $table->foreignId('cor_id')->after('modelo_id')->constrained('cores')->onDelete('cascade');
            });
        }
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('veiculos', function (Blueprint $table) {
            $table->dropForeign(['marca_id']);
            $table->dropForeign(['modelo_id']);
            $table->dropForeign(['cor_id']);
            $table->dropColumn(['marca_id', 'modelo_id', 'cor_id']);
        });

        Schema::table('veiculos', function (Blueprint $table) {
            $table->string('marca')->after('id');
            $table->string('modelo')->after('marca');
            $table->string('cor')->after('modelo');
        });
    }
};
