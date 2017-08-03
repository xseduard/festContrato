<?php

namespace App\Models;

use App\Traits\DatesTranslator;
use App\Traits\UserRelation;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Departamento
 * @package App\Models
 * @version August 3, 2017, 3:22 am -05
 *
 * @method static Departamento find($id=null, $columns = array())
 * @method static Departamento|\Illuminate\Database\Eloquent\Collection findOrFail($id, $columns = ['*'])
 * @property string nombre
 */
class Departamento extends Model
{
use DatesTranslator, UserRelation;
    use SoftDeletes;

    public $table = 'departamentos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     */
    protected $casts = [
        'nombre' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     */
    public static $rules = [
        'nombre' => 'required'
    ];

    public static $attributesCustom = [     
        
        'nombre',
           
    ];

    /**
     * Relationship Models
     */
    
    // public function modelo(){
    //     return $this->belongsTo('App\Models\Modelo');
    // }  

    public function municipios(){
        return $this->hasMany('App\Models\Municipio');
    }

    

    /**
     *  Ascensores & Mutadores
     */
   
}
