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
        // Cria 20 usuários aleatórios
        User::factory(20)->create();

        // Cria 20 faturas aleatórias
        Invoices::factory(20)->create();

        // Cria um usuário de teste com dados específicos
        User::factory()->create([
            'firstName' => 'Test',
            'lastName' => 'User',
            'email' => 'test@example.com',
        ]);
    }
}
