<?php

// Composer: "fzaninotto/faker": "v1.3.0"
use Faker\Factory as Faker;

class CustomersTableSeeder extends Seeder {

    public function run()
    {
        $faker = Faker::create();

        foreach(range(1, 100) as $index)
        {
            Customer::create([
				'customer_name' => $faker->company,
				'address'       => $faker->address,
				'city'          => $faker->city,
				'state'         => $faker->stateAbbr,
				'zip'           => $faker->postcode
			]);
        }
    }

}