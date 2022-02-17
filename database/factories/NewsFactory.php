<?php

namespace Database\Factories;

use App\Models\Category;
use App\Models\News;
use App\Models\Tag;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;

class NewsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = News::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'title' => $this->faker->title,
            'text' => $this->faker->realText(1000),
//            'title' => $this->faker->name(),
//            'description' => $this->faker->text(255),
//            'body' => $this->faker->realText(1000),
        ];
    }

    public function configure()
    {
        return $this->afterMaking(function (News $news) {
            $news->category()->associate(
                Category::inRandomOrder()
                    ->first()
            );
            $news->save();
        })->afterCreating(function (News $news) {
            $news->users()->sync(
                User::inRandomOrder()
                    ->take(random_int(2, 5))
                    ->get()
                    ->pluck("id")
            );
            $news->tags()->sync(
                Tag::inRandomOrder()
                    ->take(random_int(2, 5))
                    ->get()
                    ->pluck("id")
            );
        });
    }
}
