<?php

namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Accuse;

class AccuseApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_accuse()
    {
        $accuse = Accuse::factory()->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/accuses', $accuse
        );

        $this->assertApiResponse($accuse);
    }

    /**
     * @test
     */
    public function test_read_accuse()
    {
        $accuse = Accuse::factory()->create();

        $this->response = $this->json(
            'GET',
            '/api/accuses/'.$accuse->id
        );

        $this->assertApiResponse($accuse->toArray());
    }

    /**
     * @test
     */
    public function test_update_accuse()
    {
        $accuse = Accuse::factory()->create();
        $editedAccuse = Accuse::factory()->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/accuses/'.$accuse->id,
            $editedAccuse
        );

        $this->assertApiResponse($editedAccuse);
    }

    /**
     * @test
     */
    public function test_delete_accuse()
    {
        $accuse = Accuse::factory()->create();

        $this->response = $this->json(
            'DELETE',
             '/api/accuses/'.$accuse->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/accuses/'.$accuse->id
        );

        $this->response->assertStatus(404);
    }
}
