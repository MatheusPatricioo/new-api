<?php

namespace Database\Seeders;

use App\Models\User;
use App\Models\Invoices;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Cria 10 usuários aleatórios
        User::factory(20)->create();

        // Cria 10 faturas aleatórias
        Invoices::factory(20)->create();

        // Cria um usuário de teste com dados específicos
        User::factory()->create([
            'name' => 'Test User',
            'email' => 'test@example.com',
        ]);
    }
}
