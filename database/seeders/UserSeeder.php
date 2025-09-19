<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        // Użytkownik admin
        $admin = User::create([
            'name' => 'Administrator',
            'email' => 'admin@admin.com',
            'password' => Hash::make('haslo123'),
        ]);
        $admin->assignRole('admin');

        // Użytkownik firma
        $firma = User::create([
            'name' => 'Firma Testowa',
            'email' => 'firma@firma.com',
            'password' => Hash::make('haslo123'),
        ]);
        $firma->assignRole('firma');

        // Użytkownik klient
        $klient = User::create([
            'name' => 'Klient Testowy',
            'email' => 'klient@klient.com',
            'password' => Hash::make('haslo123'),
        ]);
        $klient->assignRole('klient');
    }
}<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    public function run(): void
    {
        $user = User::create([
            'name' => 'Admin',
            'email' => 'admin@top-skarbonka.pl',
            'password' => bcrypt('Haslo123!'),
        ]);

        $user->assignRole('admin');
    }
}
