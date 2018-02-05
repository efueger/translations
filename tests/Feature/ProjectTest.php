<?php

namespace Tests\Feature;

use App\Client;
use App\Project;
use ProjectsTableSeeder;
use Tests\TestCase;
use function route;
use function str_random;

class ProjectTest extends TestCase
{
    /**
     * A basic test example.
     *
     * @return void
     */
    public function testProjectsIndexPage()
    {
        $response = $this->actingAs(Client::firstOrFail())->get(route('projects.index'));

        $response->assertStatus(200)->assertSee(ProjectsTableSeeder::AMAZING_PROJECT);
    }

    public function testProjectsStoreSuccess()
    {
        $name = str_random(15);
        $response = $this->actingAs(Client::firstOrFail())->post(
            route('projects.store'),
            [
                'name' => $name,
            ]
        );
        $response->assertStatus(302);
        $this->assertTrue(Project::whereName($name)->exists());
    }

    public function testProjectsStoreFail()
    {
        //without authorization
        $this->postJson(route('projects.store'), ['name' => str_random(10),])->assertStatus(401);

        //validation fail
        $name = str_random(31);//project name max length = 30
        $response = $this->actingAs(Client::firstOrFail())->postJson(
            route('projects.store'),
            ['name' => $name,]
        );
        $response->assertStatus(422);
        $this->assertFalse(Project::whereName($name)->exists());
    }

    public function testProjectsDestroyPolicy()
    {
        $client = Client::firstOrFail();
        $projectID = Project::where('user_id', '<>', $client->id)->firstOrFail()->id;

        $this->actingAs($client)->postJson(
            route('projects.destroy', ['project' => $projectID,]),
            [
                '_method' => 'delete',
            ]
        )->assertStatus(403);
    }

    public function testProjectsDestroy()
    {
        $client = Client::firstOrFail();
        $projectID = Project::whereUserId($client->id)->firstOrFail()->id;

        $this->actingAs($client)->postJson(
            route('projects.destroy', ['project' => $projectID,]),
            [
                '_method' => 'delete',
            ]
        )->assertStatus(302);

        $this->assertFalse(Project::whereId($projectID)->exists());
    }

    public function testProjectsCreatePage()
    {
        $client = Client::firstOrFail();

        $response = $this->actingAs($client)->get(route('projects.create'));
        $response->assertSee('Project name:');
        $response->assertSee('Submit');
    }

    public function testProjectsEditPage()
    {
        $client = Client::firstOrFail();

        $response = $this->actingAs($client)->get(
            route('projects.edit', ['project' => $client->projects()->first()])
        );
        $response->assertSee('Project name:');
//        $response->assertSeeText($client->projects()->first()->name);
        $response->assertSee('Submit');
    }
}
