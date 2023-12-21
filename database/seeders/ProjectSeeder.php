<?php

namespace Database\Seeders;

use App\Models\Project;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Faker\Generator as Faker;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(Faker $faker)
    {
        for ($i = 0; $i < 10; $i++) {

            $new_project = new Project;

            $new_project->img = $faker->imageurl();
            $new_project->title = $faker->sentence(5);
            $new_project->description = $faker->text();
            $new_project->save();

        }
    }
}
