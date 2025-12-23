<?php

    namespace Database\Seeders;

    use Illuminate\Database\Seeder;
    use App\Models\User;
    use Faker\Factory as Faker;

    class UserTableSeeder extends Seeder
    {
        public function run()
        {
            $faker = Faker::create();

            foreach(range(1, 50) as $index) {
                User::create([
                    'username' => $faker->userName,
                    'email' => $faker->unique()->safeEmail,
                    'password' => bcrypt('password'),
                    'role' => $faker->randomElement(['admin','user','moderator']),
                ]);
            }
        }
    }
