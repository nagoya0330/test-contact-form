<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\Category;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $category = Category::inRandomOrder()->first();

        return [
            'last_name' => $this->faker->lastName,
            'first_name' => $this->faker->firstName,
            'gender' => $this->faker->randomElement([0, 1]),
            'email' => $this->faker->unique()->safeEmail,
            'tel' => $this->faker->numerify('0#########'),
            'address' => $this->faker->address,
            'building' => $this->faker->optional()->secondaryAddress, // 建物名を追加
            'category_id' => $category ? $category->id : 1,
            'detail' => $this->faker->randomElement([
                'サービスについて詳しく知りたいです。',
                '商品の返品について相談したいのですが。',
                'サイトの使い方が分からないので教えてください。',
                '見積もりをお願いしたいです。',
                'サポートの対応に関してご意見があります。',
            ]), // お問い合わせっぽい文章
        ];
    }
}
