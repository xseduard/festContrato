<?php

namespace App\Repositories;

use App\Models\Rubro;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class RubroRepository
 * @package App\Repositories
 * @version August 3, 2017, 1:59 am -05
 *
 * @method Rubro findWithoutFail($id, $columns = ['*'])
 * @method Rubro find($id, $columns = ['*'])
 * @method Rubro first($columns = ['*'])
*/
class RubroRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'codigo',
        'valor',
        'fecha_vigencia_inicio',
        'fecha_vigencia_final'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Rubro::class;
    }
}
