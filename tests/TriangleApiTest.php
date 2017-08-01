<?php

use Illuminate\Foundation\Testing\WithoutMiddleware;
use Illuminate\Foundation\Testing\DatabaseTransactions;

class TriangleApiTest extends TestCase
{
    use MakeTriangleTrait, ApiTestTrait, WithoutMiddleware, DatabaseTransactions;

    /**
     * @test
     */
    public function testCreateTriangle()
    {
        $triangle = $this->fakeTriangleData();
        $this->json('POST', '/api/v1/triangles', $triangle);

        $this->assertApiResponse($triangle);
    }

    /**
     * @test
     */
    public function testReadTriangle()
    {
        $triangle = $this->makeTriangle();
        $this->json('GET', '/api/v1/triangles/'.$triangle->id);

        $this->assertApiResponse($triangle->toArray());
    }

    /**
     * @test
     */
    public function testUpdateTriangle()
    {
        $triangle = $this->makeTriangle();
        $editedTriangle = $this->fakeTriangleData();

        $this->json('PUT', '/api/v1/triangles/'.$triangle->id, $editedTriangle);

        $this->assertApiResponse($editedTriangle);
    }

    /**
     * @test
     */
    public function testDeleteTriangle()
    {
        $triangle = $this->makeTriangle();
        $this->json('DELETE', '/api/v1/triangles/'.$triangle->id);

        $this->assertApiSuccess();
        $this->json('GET', '/api/v1/triangles/'.$triangle->id);

        $this->assertResponseStatus(404);
    }
}
