<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(UserSeeder::class);

        factory(App\User::class, 3)->create()->each(static function ($user) {
            $user->questions()
                ->saveMany(
                    factory(App\Question::class, rand(1, 10))->make()
                );
        });
    }
}
