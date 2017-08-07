<?php

namespace App\Repositories;

use App\Models\Faccion;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class FaccionRepository
 * @package App\Repositories
 * @version August 4, 2017, 2:36 am -05
 *
 * @method Faccion findWithoutFail($id, $columns = ['*'])
 * @method Faccion find($id, $columns = ['*'])
 * @method Faccion first($columns = ['*'])
*/
class FaccionRepository extends BaseRepository
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
        return Faccion::class;
    }
}
