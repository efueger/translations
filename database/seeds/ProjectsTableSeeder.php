<?php

use App\Client;
use App\Project;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    const PROJECT_NAME = 'Amazing project';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::create([
            'name' => self::PROJECT_NAME,
            'user_id' => Client::first()->id,
        ]);
    }
}
