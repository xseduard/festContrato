<?php

namespace App\Repositories;

use App\Models\Contrato;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class ContratoRepository
 * @package App\Repositories
 * @version August 4, 2017, 12:18 pm -05
 *
 * @method Contrato findWithoutFail($id, $columns = ['*'])
 * @method Contrato find($id, $columns = ['*'])
 * @method Contrato first($columns = ['*'])
*/
class ContratoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'codigo',
        'contratable_id',
        'contratable_type',
        'objeto',
        'faccion_id',
        'supervisor_aux_id',
        'fecha_expedicion',
        'fecha_vigencia_inicio',
        'fecha_vigencia_final',
        'valor_contrato',
        'compromiso_presupuestal',
        'compromiso_presupuestal_fecha',
        'tipo',
        'rubro_id',
        'observaciones'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Contrato::class;
    }
}
