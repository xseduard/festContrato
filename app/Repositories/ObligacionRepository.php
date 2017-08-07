<?php

namespace App\Repositories;

use App\Models\Obligacion;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ObligacionRepository
 * @package App\Repositories
 * @version August 4, 2017, 10:59 am -05
 *
 * @method Obligacion findWithoutFail($id, $columns = ['*'])
 * @method Obligacion find($id, $columns = ['*'])
 * @method Obligacion first($columns = ['*'])
*/
class ObligacionRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'item',
        'status'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Obligacion::class;
    }
}
