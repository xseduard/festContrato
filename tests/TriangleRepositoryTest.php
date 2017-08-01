<?php

use App\Models\Triangle;
use App\Repositories\TriangleRepository;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TriangleRepositoryTest extends TestCase
{
    use MakeTriangleTrait, ApiTestTrait, DatabaseTransactions;

    /**
     * @var TriangleRepository
     */
    protected $triangleRepo;

    public function setUp()
    {
        parent::setUp();
        $this->triangleRepo = App::make(TriangleRepository::class);
    }

    /**
     * @test create
     */
    public function testCreateTriangle()
    {
        $triangle = $this->fakeTriangleData();
        $createdTriangle = $this->triangleRepo->create($triangle);
        $createdTriangle = $createdTriangle->toArray();
        $this->assertArrayHasKey('id', $createdTriangle);
        $this->assertNotNull($createdTriangle['id'], 'Created Triangle must have id specified');
        $this->assertNotNull(Triangle::find($createdTriangle['id']), 'Triangle with given id must be in DB');
        $this->assertModelData($triangle, $createdTriangle);
    }

    /**
     * @test read
     */
    public function testReadTriangle()
    {
        $triangle = $this->makeTriangle();
        $dbTriangle = $this->triangleRepo->find($triangle->id);
        $dbTriangle = $dbTriangle->toArray();
        $this->assertModelData($triangle->toArray(), $dbTriangle);
    }

    /**
     * @test update
     */
    public function testUpdateTriangle()
    {
        $triangle = $this->makeTriangle();
        $fakeTriangle = $this->fakeTriangleData();
        $updatedTriangle = $this->triangleRepo->update($fakeTriangle, $triangle->id);
        $this->assertModelData($fakeTriangle, $updatedTriangle->toArray());
        $dbTriangle = $this->triangleRepo->find($triangle->id);
        $this->assertModelData($fakeTriangle, $dbTriangle->toArray());
    }

    /**
     * @test delete
     */
    public function testDeleteTriangle()
    {
        $triangle = $this->makeTriangle();
        $resp = $this->triangleRepo->delete($triangle->id);
        $this->assertTrue($resp);
        $this->assertNull(Triangle::find($triangle->id), 'Triangle should not exist in DB');
    }
}
