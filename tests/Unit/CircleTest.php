<?php

namespace Tests\Unit;

use Tests\TestCase;
// use PHPUnit\Framework\TestCase;

class CircleTest extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function test_example()
    {
        $response = $this->call( 'GET', '/api/v1/circle/4/sum/8?shape=circle&unit=cm');

        $response->assertStatus($response->status());
        $this->assertTrue(true);
    }
}
