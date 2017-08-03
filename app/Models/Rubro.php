<?php

namespace App\Models;

use App\Traits\DatesTranslator;
use App\Traits\UserRelation;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Rubro
 * @package App\Models
 * @version August 3, 2017, 1:59 am -05
 *
 * @method static Rubro find($id=null, $columns = array())
 * @method static Rubro|\Illuminate\Database\Eloquent\Collection findOrFail($id, $columns = ['*'])
 * @property string nombre
 * @property string codigo
 * @property decimal valor
 * @property date fecha_vigencia_inicio
 * @property date fecha_vigencia_final
 */
class Rubro extends Model
{
    use DatesTranslator, UserRelation;
    use SoftDeletes;


    public $table = 'rubros';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'codigo',
        'valor',
        'fecha_vigencia_inicio',
        'fecha_vigencia_final',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     */
    protected $casts = [
        'nombre' => 'string',
        'codigo' => 'string',
        'fecha_vigencia_inicio' => 'date',
        'fecha_vigencia_final' => 'date',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     */
    public static $rules = [
        'nombre' => 'required|string',
        'codigo' => 'required|numeric',
        'valor' => 'required',
        'fecha_vigencia_inicio' => 'required|date',
        'fecha_vigencia_final' => 'required|date'
    ];

    public static $attributesCustom = [ 
        
        'fecha_vigencia_inicio' => 'Fecha de vigencia inicio',
        'fecha_vigencia_final' => 'Fecha de vigencia final',
          
    ];

    /**
     * Relationship Models
     */
    
    // public function modelo(){
    //     return $this->belongsTo('App\Models\Modelo');
    // }    

    

    /**
     *  Ascensores & Mutadores
     */
}
