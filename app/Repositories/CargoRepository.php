<?php

namespace App\Repositories;

use App\Models\Cargo;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class CargoRepository
 * @package App\Repositories
 * @version August 4, 2017, 2:31 am -05
 *
 * @method Cargo findWithoutFail($id, $columns = ['*'])
 * @method Cargo find($id, $columns = ['*'])
 * @method Cargo first($columns = ['*'])
*/
class CargoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'key',
        'nombre',
        'observaciones'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Cargo::class;
    }
}
