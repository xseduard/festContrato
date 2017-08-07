<?php

namespace App\Repositories;

use App\Models\Juridico;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class JuridicoRepository
 * @package App\Repositories
 * @version August 3, 2017, 6:34 pm -05
 *
 * @method Juridico findWithoutFail($id, $columns = ['*'])
 * @method Juridico find($id, $columns = ['*'])
 * @method Juridico first($columns = ['*'])
*/
class JuridicoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nit',
        'nombre',
        'razon_social',
        'natural_id',
        'municipio_id',
        'actividad',
        'celular',
        'telefono',
        'email',
        'observaciones',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Juridico::class;
    }
}
