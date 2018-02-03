<?php

use App\Client;
use App\Project;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Project::create([
            'name' => 'Amazing project',
            'user_id' => Client::first()->id,
        ]);
    }
}
