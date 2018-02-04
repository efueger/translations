<?php

namespace Tests\Feature;

use App\Client;
use ProjectsTableSeeder;
use Tests\TestCase;

class ProjectTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testProjectsIndexPage()
    {
        $response = $this->actingAs(Client::firstOrFail())->get('/projects');

        $response->assertStatus(200)->assertSeeText(ProjectsTableSeeder::AMAZING_PROJECT);
    }
}
