<?php

namespace Tests\Feature;

use App\Models\Contact;
use App\Models\File;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ContactControllerTest extends TestCase
{
    private User $user;

    protected function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    /** @test */
    public function indexTest()
    {
        $this->actingAs($this->user);

        $response = $this->get('/')
            ->assertSuccessful();

        $response->assertSee(trans('contacts.welcome'));
    }

    /** @test */
    public function indexAuthenticationTest()
    {
        $result = $this->get('/')
            ->assertRedirect();
        $result->assertSee('/login');
        $result->assertSee('Redirecting to ');


    }

    /** @test */
    public function showTest()
    {
        $this->actingAs($this->user);

        $file = File::factory()->create(['user_id' => $this->user->id]);
        $contact = Contact::factory(10)->create(['name'=> 'name_contact', 'file_id' => $file->id]);

        $response = $this->get('/contacts')
            ->assertSuccessful();



    }


}
