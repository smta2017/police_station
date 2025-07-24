<?php

namespace Tests\Repositories;

use App\Models\Accuse;
use App\Repositories\AccuseRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class AccuseRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    protected AccuseRepository $accuseRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->accuseRepo = app(AccuseRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_accuse()
    {
        $accuse = Accuse::factory()->make()->toArray();

        $createdAccuse = $this->accuseRepo->create($accuse);

        $createdAccuse = $createdAccuse->toArray();
        $this->assertArrayHasKey('id', $createdAccuse);
        $this->assertNotNull($createdAccuse['id'], 'Created Accuse must have id specified');
        $this->assertNotNull(Accuse::find($createdAccuse['id']), 'Accuse with given id must be in DB');
        $this->assertModelData($accuse, $createdAccuse);
    }

    /**
     * @test read
     */
    public function test_read_accuse()
    {
        $accuse = Accuse::factory()->create();

        $dbAccuse = $this->accuseRepo->find($accuse->id);

        $dbAccuse = $dbAccuse->toArray();
        $this->assertModelData($accuse->toArray(), $dbAccuse);
    }

    /**
     * @test update
     */
    public function test_update_accuse()
    {
        $accuse = Accuse::factory()->create();
        $fakeAccuse = Accuse::factory()->make()->toArray();

        $updatedAccuse = $this->accuseRepo->update($fakeAccuse, $accuse->id);

        $this->assertModelData($fakeAccuse, $updatedAccuse->toArray());
        $dbAccuse = $this->accuseRepo->find($accuse->id);
        $this->assertModelData($fakeAccuse, $dbAccuse->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_accuse()
    {
        $accuse = Accuse::factory()->create();

        $resp = $this->accuseRepo->delete($accuse->id);

        $this->assertTrue($resp);
        $this->assertNull(Accuse::find($accuse->id), 'Accuse should not exist in DB');
    }
}
