<?php

namespace App\Repositories;

use App\Models\Departamento;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DepartamentoRepository
 * @package App\Repositories
 * @version August 3, 2017, 3:22 am -05
 *
 * @method Departamento findWithoutFail($id, $columns = ['*'])
 * @method Departamento find($id, $columns = ['*'])
 * @method Departamento first($columns = ['*'])
*/
class DepartamentoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Departamento::class;
    }
}
