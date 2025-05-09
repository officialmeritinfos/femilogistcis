<?php

namespace Database\Factories;

use App\Models\GeneralSetting;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;

class GeneralSettingFactory extends Factory
{
    protected $model = GeneralSetting::class;
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'name'  =>'My HYIP Website',
            'email' =>$this->faker->safeEmail(),
            'phone' =>$this->faker->phoneNumber(),
            'address'=>$this->faker->address(),
            'logo'=>Str::random(30),
            'favicon'=>Str::random('20'),
            'currency'=>$this->faker->currencyCode(),
            'currencySign'=>''
        ];
    }
}
