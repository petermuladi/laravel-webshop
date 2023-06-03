<?php

namespace Database\Factories;

use Illuminate\Support\Facades\File;
use Illuminate\Database\Eloquent\Factories\Factory;


class ProductFactory extends Factory
{
    public function definition(): array
    {
        $imagePath = public_path('storage/images');
        $imageFiles = File::allFiles($imagePath);
        $imageNames = [];

        foreach ($imageFiles as $file) {
            $imageNames[] = $file->getBasename();
        }

        return [
            'name' => fake()->word(),
            'description' => fake()->sentence(),
            'price' => fake()->randomFloat(2,1,100),
            'threepiecesprice' => fake()->randomFloat(2,50,200),
            'fivepiecesprice' => fake()->randomFloat(2,300,400),
            'instock' => 1,
            'product_pics' => function () use ($imageNames) {
                return fake()->randomElement($imageNames);
            },
        ];
    }
}
