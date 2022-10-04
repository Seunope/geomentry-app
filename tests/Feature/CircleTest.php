<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class CircleTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_compute_singe_shape()
    {
        $response = $this->get('/api/v1/circle/4');

        $response->assertStatus(200);
    }

    public function test_compute_two_shapes()
    {
        $response = $this->get('/api/v1/circle/4/sum/5?unit=cm&shape=circle');

        $response->assertStatus(200);
    }
}
