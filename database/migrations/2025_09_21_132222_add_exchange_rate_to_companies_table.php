<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            // Dodajemy bez AFTER (pozycja kolumny nie ma znaczenia)
            if (!Schema::hasColumn('companies', 'exchange_rate')) {
                $table->decimal('exchange_rate', 5, 2)->default(0.5);
            }
        });
    }

    public function down(): void
    {
        Schema::table('companies', function (Blueprint $table) {
            if (Schema::hasColumn('companies', 'exchange_rate')) {
                $table->dropColumn('exchange_rate');
            }
        });
    }
};
