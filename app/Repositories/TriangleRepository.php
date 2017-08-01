<?php

namespace App\Repositories;

use App\Models\Triangle;
use InfyOm\Generator\Common\BaseRepository;

class TriangleRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'text',
        'numero',
        'parrafo'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Triangle::class;
    }
}
