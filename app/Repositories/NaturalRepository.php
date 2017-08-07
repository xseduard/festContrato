<?php

namespace App\Repositories;

use App\Models\Natural;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class NaturalRepository
 * @package App\Repositories
 * @version August 3, 2017, 1:22 pm -05
 *
 * @method Natural findWithoutFail($id, $columns = ['*'])
 * @method Natural find($id, $columns = ['*'])
 * @method Natural first($columns = ['*'])
*/
class NaturalRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'cedula' => 'LIKE',
        'expedicion_mpio_id' => 'LIKE',
        'nombres' => 'LIKE',
        'apellidos' => 'LIKE',
        'genero' => 'LIKE',
        'direccion' => 'LIKE',
        'direccion_mpio_id' => 'LIKE',
        'celular' => 'LIKE',
        'telefono' => 'LIKE',
        'observaciones' => 'LIKE',
        'status' => 'LIKE',
        'user_gen_id' => 'LIKE',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Natural::class;
    }
}
