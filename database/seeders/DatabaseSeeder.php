<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;
use App\Models\Question;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory()->count(3)->create()->each(function ($u) {
            $u->questions()
                ->saveMany(
                    Question::factory()->count(rand(1, 5))->make()
                );
        });
    }
}
