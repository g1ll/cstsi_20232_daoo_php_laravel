<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Produto;
use App\Models\Promocao;
use Carbon\Carbon;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $this->call([
            RegiaoSeeder::class,
            EstadoSeeder::class,
            PromocaoSeeder::class
        ]);

        //Sem PromocaoFactory
        \App\Models\Fornecedor::factory(5)
            ->has(Produto::factory(20)->hasAttached(
                Promocao::all()->random(2),
                [
                    'created_at'=>Carbon::now()->toDateTimeString(),
                    'updated_at'=>Carbon::now()->toDateTimeString(),
                    'desconto'=>25
                ],
                'promocoes'//promoacaos
            ))
            ->create();






    }
}
