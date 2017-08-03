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
        'cedula',
        'expedicion_mpio_id',
        'nombres',
        'apellidos',
        'genero',
        'direccion',
        'direccion_mpio_id',
        'correo',
        'celular',
        'telefono',
        'observaciones',
        'status',
        'user_gen_id'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Natural::class;
    }
}
