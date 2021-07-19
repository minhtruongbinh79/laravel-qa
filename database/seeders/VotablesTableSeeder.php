<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Question;
use App\Models\User;

class VotablesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        \DB::table('votables')->where('votable_type', 'App\Question')->delete();

        $users = User::all();
        $numberOfUsers = $users->count();
        $votes = [-1, 1];

        foreach (Question::all() as $question) {
            for ($i = 0; $i < rand(1, $numberOfUsers); $i++) {
                $users[$i]->voteQuestion($question, $votes[rand(0, 1)]);
            }
        }
    }
}
