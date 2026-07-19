<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ExampleTest extends TestCase
{
    use RefreshDatabase;

    /**
     * A basic test example.
     */
    public function test_the_application_returns_a_successful_response(): void
    {
        $this->seed();

        $response = $this->get('/');

        $response->assertStatus(200);
    }

    public function test_consultation_page_displays_seeded_questions(): void
    {
        $this->seed();

        $response = $this->get('/konsultasi');

        $response->assertStatus(200);
        $response->assertSee('Bagaimana intensitas pencahayaan ruangan?');
        $response->assertSee('Apakah memiliki hewan peliharaan?');
    }
}
