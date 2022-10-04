<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class TriangleTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
    public function test_compute_singe_shape()
    {
        $response = $this->get('/api/v1/triangle/4/6/3');

        $response->assertStatus(200);
    }

    public function test_compute_two_shapes()
    {
        $response = $this->get('/api/v1/triangle/4/6/5/sum/3/8/5?unit=cm&shape=triangle');

        $response->assertStatus(200);
    }
}
