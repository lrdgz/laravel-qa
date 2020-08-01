<?php

use Illuminate\Database\Seeder;

use App\User;
use App\Question;
use App\Answer;

class UsersQuestionsAnswersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        \DB::table('answers')->delete();
        \DB::table('questions')->delete();
        \DB::table('users')->delete();

        factory(User::class, 3)->create()->each(static function ($user) {
            $user->questions()
                ->saveMany(
                    factory(Question::class, random_int(1, 10))->make()
                )
                ->each(static function ($question) {
                    $question->answers()->saveMany(factory(Answer::class, random_int(1, 5))->make());
                });
        });
    }
}
