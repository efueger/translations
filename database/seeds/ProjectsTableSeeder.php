<?php

use App\Client;
use App\Project;
use Illuminate\Database\Seeder;

class ProjectsTableSeeder extends Seeder
{
    const AMAZING_PROJECT = 'Amazing project';//using for tests
    const ANOTHER_PROJECT = 'Another project';

    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $client = Client::first();
        Project::insert([
            [
                'name' => self::AMAZING_PROJECT,
                'user_id' => $client->id,
            ],
            [
                'name' => self::ANOTHER_PROJECT,
                'user_id' => $client->id,
            ],
        ]);
    }
}
