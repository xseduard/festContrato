<?php

namespace App\Models;

use App\Traits\DatesTranslator;
use App\Traits\DatesLife;
use App\Traits\UserRelation;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Contrato
 * @package App\Models
 * @version August 4, 2017, 12:18 pm -05
 *
 */
class Contrato extends Model
{
use DatesTranslator, DatesLife, UserRelation;
    use SoftDeletes;

    public $table = 'contratos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
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
        'observaciones',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     */
    protected $casts = [
        'codigo' => 'string',
        'contratable_id' => 'integer',
        'contratable_type' => 'string',
        'objeto' => 'string',
        'faccion_id' => 'integer',
        'supervisor_aux_id' => 'integer',
        'fecha_expedicion' => 'date',
        'fecha_vigencia_inicio' => 'date',
        'fecha_vigencia_final' => 'date',
        'compromiso_presupuestal' => 'string',
        'compromiso_presupuestal_fecha' => 'date',
        'tipo' => 'string',
        'rubro_id' => 'integer',
        'observaciones' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     */
    public static $rules = [
        'codigo' => 'required|numeric',
        'contratable_id' => 'required',
        'contratable_type' => 'required',
        'objeto' => 'required',
        'faccion_id' => 'required',
        'fecha_expedicion' => 'required|date',
        'fecha_vigencia_inicio' => 'required|date',
        'fecha_vigencia_final' => 'required|date',
        'valor_contrato' => 'required',
        'compromiso_presupuestal' => 'required|numeric',
        'compromiso_presupuestal_fecha' => 'required|date',
        'tipo' => 'required',
        'rubro_id' => 'required'
    ];

    public static $attributesCustom = [     
        
        'codigo'                        => 'codigo',
        'contratable_id'                => 'contratista',
        'contratable_type'              => 'tipo de contratista',
        'objeto'                        => 'objeto',
        'faccion_id'                    => 'facción',
        'supervisor_aux_id'             => 'supervisor auxiliar',
        'fecha_expedicion'              => 'fecha de expedición',
        'fecha_vigencia_inicio'         => 'acta de inicio',
        'fecha_vigencia_final'          => 'fecha vigencia final contrato',
        'valor_contrato'                => 'valor del contrato',
        'compromiso_presupuestal'       => 'compromiso presupuestal',
        'compromiso_presupuestal_fecha' => 'fecha compromiso presupuestal',
        'tipo'                          => 'tipo',
        'rubro_id'                      => 'rubro',
        'observaciones'                 => 'observaciones',
           
    ];

    /**
     * Relationship Models
     */
    
    public function faccion(){
        return $this->belongsTo('App\Models\Faccion');
    }
    public function rubro(){
        return $this->belongsTo('App\Models\Rubro');
    }
    public function supervisorAux(){
        return $this->belongsTo('App\Models\Natural', 'supervisor_aux_id');
    }
    public function contratable()
    {
        return $this->morphTo();
    }
    public function obligacion(){
        return $this->hasMany('App\Models\Obligacion', 'contrato_id', 'id');
    }

    

    /**
     *  Ascensores & Mutadores
     */
 
}
