<?php

namespace Database\Factories;

use App\Models\Contact;
use App\Models\File;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContactFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Contact::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name' => $this->faker->name,
            'email' => $this->faker->unique()->safeEmail,
            'date_of_birth' => '2020-01-01',
            'phone' => '(+57) 300 301 77 88',
            'address' => $this->faker->address,
            'card_token' => 'asdf',
            'card_last_digits' => '123',
            'franchise' => 'Visa',
            'file_id' => File::factory()->create()->id,
        ];
    }
}
