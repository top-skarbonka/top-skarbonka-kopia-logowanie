<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            // Wszystkie dodatkowe pola ustawiamy jako opcjonalne
            $table->string('postal_code')->nullable()->change();
            $table->string('street')->nullable()->change();
            $table->string('nip')->nullable()->change();
            $table->string('phone')->nullable()->change();
            $table->decimal('exchange_rate', 5, 2)->default(0.5)->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            // Przywracamy wymagane pola (jakby trzeba było cofnąć)
            $table->string('postal_code')->nullable(false)->change();
            $table->string('street')->nullable(false)->change();
            $table->string('nip')->nullable(false)->change();
            $table->string('phone')->nullable(false)->change();
            $table->decimal('exchange_rate', 5, 2)->default(0.5)->nullable(false)->change();
        });
    }
};
