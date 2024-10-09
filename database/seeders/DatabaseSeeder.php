<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Proposal;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    public function run(): void
    {
        User::factory(200)->create();

        User::query()
            ->inRandomOrder()
            ->limit(50)
            ->get()
            ->each(function (User $user) {

                $project = Project::factory(50)->create(['created_by' => $user->id]);

                Proposal::factory()->count(random_int(2, 20))->create([
                    'project_id' => $project->random()->id,
                ]);
            });
    }
}
