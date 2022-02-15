<?php

namespace Database\Factories;

use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class CategoryFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Category::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
//            'email' => $this->faker->unique()->safeEmail,
        ];
    }

    public function configure()
    {
        return $this->afterCreating(function (Category $category) {
            $parent = Category::inRandomOrder()
                ->first();
            if (random_int(0, 1) && $parent) {
                $category->parent()->associate(
                    $parent
                );
                $category->save();
            }
        });
    }

}
