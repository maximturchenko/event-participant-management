<?php

namespace TestApi;

use PHPUnit\Framework\TestCase;

class TestsApiParticipants extends TestCase
{
    /**
     * A basic unit test example.
     *
     * @return void
     */
    public function testExample()
    {
        $response = $this->getJson('/api/participants');

        $response
            ->assertStatus(201)
            ->assertJson([
                'success' => true,
            ]);
    }
}
