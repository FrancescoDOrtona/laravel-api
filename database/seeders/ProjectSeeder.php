<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Technology;
use App\Models\Type;
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

        $types = Type::all();
        $ids = $types->pluck('id');

        $technologies = Technology::all();
        $techIds = $technologies->pluck('id');

        for ($i = 0; $i < 10; $i++) {

            $new_project = new Project;

            $new_project->img = $faker->imageurl();
            $new_project->title = $faker->sentence(5);
            $new_project->description = $faker->text();
            $new_project->type_id = $faker->optional()->randomElement($ids);
            $new_project->technology_id = $faker->optional()->randomElement($techIds);
            $new_project->save();

        }
    }
}
