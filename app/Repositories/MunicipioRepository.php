<?php

namespace App\Repositories;

use App\Models\Municipio;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class MunicipioRepository
 * @package App\Repositories
 * @version August 3, 2017, 3:29 am -05
 *
 * @method Municipio findWithoutFail($id, $columns = ['*'])
 * @method Municipio find($id, $columns = ['*'])
 * @method Municipio first($columns = ['*'])
*/
class MunicipioRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre' => 'like',
        'departamento_id' => 'like',
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Municipio::class;
    }
}
