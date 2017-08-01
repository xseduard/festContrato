<?php

use Faker\Factory as Faker;
use App\Models\Triangle;
use App\Repositories\TriangleRepository;

trait MakeTriangleTrait
{
    /**
     * Create fake instance of Triangle and save it in database
     *
     * @param array $triangleFields
     * @return Triangle
     */
    public function makeTriangle($triangleFields = [])
    {
        /** @var TriangleRepository $triangleRepo */
        $triangleRepo = App::make(TriangleRepository::class);
        $theme = $this->fakeTriangleData($triangleFields);
        return $triangleRepo->create($theme);
    }

    /**
     * Get fake instance of Triangle
     *
     * @param array $triangleFields
     * @return Triangle
     */
    public function fakeTriangle($triangleFields = [])
    {
        return new Triangle($this->fakeTriangleData($triangleFields));
    }

    /**
     * Get fake data of Triangle
     *
     * @param array $postFields
     * @return array
     */
    public function fakeTriangleData($triangleFields = [])
    {
        $fake = Faker::create();

        return array_merge([
            'text' => $fake->word,
            'numero' => $fake->randomDigitNotNull,
            'parrafo' => $fake->text,
            'created_at' => $fake->word,
            'updated_at' => $fake->word
        ], $triangleFields);
    }
}
