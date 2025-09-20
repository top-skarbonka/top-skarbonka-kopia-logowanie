<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('companies', function (Blueprint $table) {
            $table->id();
            $table->string('name');             // Nazwa firmy
            $table->string('postal_code');      // Kod pocztowy
            $table->string('city');             // Miasto
            $table->string('street');           // Ulica
            $table->string('nip')->unique();    // NIP
            $table->string('email')->unique();  // E-mail
            $table->string('phone')->nullable();// Telefon
            $table->string('password');         // Hasło
            $table->string('company_id')->unique(); // Unikalne ID
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('companies');
    }
};
