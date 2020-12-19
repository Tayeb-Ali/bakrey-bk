<?php namespace Tests\APIs;

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;
use Tests\TestCase;
use Tests\ApiTestTrait;
use App\Models\Bakery;

class BakeryApiTest extends TestCase
{
    use ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function test_create_bakery()
    {
        $bakery = factory(Bakery::class)->make()->toArray();

        $this->response = $this->json(
            'POST',
            '/api/bakeries', $bakery
        );

        $this->assertApiResponse($bakery);
    }

    /**
     * @test
     */
    public function test_read_bakery()
    {
        $bakery = factory(Bakery::class)->create();

        $this->response = $this->json(
            'GET',
            '/api/bakeries/'.$bakery->id
        );

        $this->assertApiResponse($bakery->toArray());
    }

    /**
     * @test
     */
    public function test_update_bakery()
    {
        $bakery = factory(Bakery::class)->create();
        $editedBakery = factory(Bakery::class)->make()->toArray();

        $this->response = $this->json(
            'PUT',
            '/api/bakeries/'.$bakery->id,
            $editedBakery
        );

        $this->assertApiResponse($editedBakery);
    }

    /**
     * @test
     */
    public function test_delete_bakery()
    {
        $bakery = factory(Bakery::class)->create();

        $this->response = $this->json(
            'DELETE',
             '/api/bakeries/'.$bakery->id
         );

        $this->assertApiSuccess();
        $this->response = $this->json(
            'GET',
            '/api/bakeries/'.$bakery->id
        );

        $this->response->assertStatus(404);
    }
}
