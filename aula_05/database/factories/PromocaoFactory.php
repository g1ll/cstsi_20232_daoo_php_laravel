<?php

namespace Database\Factories;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Promocao>
 */
class PromocaoFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {   $now = Carbon::now()->toDateTimeString();
        return [
            'nome'=>fake()->sentence(),
            'inicio'=>fake()->date('Y-m-d').' '
                     .fake()->time('H:i:s'),
            'fim'=>fake()->date('Y-m-d').' '
                     .fake()->time('H:i:s'),
            'created_at'=>$now,
            'updated_at'=>$now,

        ];
    }
}
