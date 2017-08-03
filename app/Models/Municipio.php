<?php

namespace App\Models;

use App\Traits\DatesTranslator;
use App\Traits\UserRelation;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Municipio
 * @package App\Models
 * @version August 3, 2017, 3:29 am -05
 *
 * @method static Municipio find($id=null, $columns = array())
 * @method static Municipio|\Illuminate\Database\Eloquent\Collection findOrFail($id, $columns = ['*'])
 * @property string nombre
 * @property integer departamento_id
 */
class Municipio extends Model
{
use DatesTranslator, UserRelation;
    use SoftDeletes;

    public $table = 'municipios';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'departamento_id',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     */
    protected $casts = [
        'nombre' => 'string',
        'departamento_id' => 'integer',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     */
    public static $rules = [
        'nombre' => 'required',
        'departamento_id' => 'required'
    ];

    public static $attributesCustom = [     
        
        'departamento_id' => 'departamento',
           
    ];

    /**
     * Relationship Models
     */
    
    // public function modelo(){
    //     return $this->belongsTo('App\Models\Modelo');
    // }  

    public function departamento(){
        return $this->belongsTo('App\Models\Departamento');
    }  

    
    /**
     *  Ascensores & Mutadores
     */

    public function getDepaMuniAttribute($value)
    {
        return $this->departamento->nombre.' - '.$this->nombre;
    }
}
