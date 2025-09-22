<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            // ✅ Zezwalamy na puste wartości tam, gdzie trzeba
            $table->string('postal_code')->nullable()->change();
            $table->string('phone')->nullable()->change();
        });
    }

    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            // ❌ Cofnięcie zmian – ustawiamy z powrotem na NOT NULL
            $table->string('postal_code')->nullable(false)->change();
            $table->string('phone')->nullable(false)->change();
        });
    }
};
