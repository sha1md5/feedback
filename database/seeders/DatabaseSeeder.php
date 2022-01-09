<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Question;
use Illuminate\Database\Seeder;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(2)->create();
        Project::factory(2)->create();

        $questions = config('questions.default');
        $order = 0;
        foreach ($questions as &$question) {
            $question['id'] = Str::uuid()->toString();
            //$question['created_at'] = $question['updated_at'] = new Carbon();
            $question['order'] = $order += 1;
        }

        Question::upsert($questions, array_keys($questions[0]));
    }
}
