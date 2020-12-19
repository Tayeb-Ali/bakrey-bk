<?php namespace Tests\Repositories;

use App\Models\Bakery;
use App\Repositories\BakeryRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;

class BakeryRepositoryTest extends TestCase
{
    use ApiTestTrait, DatabaseTransactions;

    /**
     * @var BakeryRepository
     */
    protected $bakeryRepo;

    public function setUp() : void
    {
        parent::setUp();
        $this->bakeryRepo = \App::make(BakeryRepository::class);
    }

    /**
     * @test create
     */
    public function test_create_bakery()
    {
        $bakery = factory(Bakery::class)->make()->toArray();

        $createdBakery = $this->bakeryRepo->create($bakery);

        $createdBakery = $createdBakery->toArray();
        $this->assertArrayHasKey('id', $createdBakery);
        $this->assertNotNull($createdBakery['id'], 'Created Bakery must have id specified');
        $this->assertNotNull(Bakery::find($createdBakery['id']), 'Bakery with given id must be in DB');
        $this->assertModelData($bakery, $createdBakery);
    }

    /**
     * @test read
     */
    public function test_read_bakery()
    {
        $bakery = factory(Bakery::class)->create();

        $dbBakery = $this->bakeryRepo->find($bakery->id);

        $dbBakery = $dbBakery->toArray();
        $this->assertModelData($bakery->toArray(), $dbBakery);
    }

    /**
     * @test update
     */
    public function test_update_bakery()
    {
        $bakery = factory(Bakery::class)->create();
        $fakeBakery = factory(Bakery::class)->make()->toArray();

        $updatedBakery = $this->bakeryRepo->update($fakeBakery, $bakery->id);

        $this->assertModelData($fakeBakery, $updatedBakery->toArray());
        $dbBakery = $this->bakeryRepo->find($bakery->id);
        $this->assertModelData($fakeBakery, $dbBakery->toArray());
    }

    /**
     * @test delete
     */
    public function test_delete_bakery()
    {
        $bakery = factory(Bakery::class)->create();

        $resp = $this->bakeryRepo->delete($bakery->id);

        $this->assertTrue($resp);
        $this->assertNull(Bakery::find($bakery->id), 'Bakery should not exist in DB');
    }
}
