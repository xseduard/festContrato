<?php

namespace App\Models;

use App\Traits\DatesTranslator;
use App\Traits\UserRelation;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Cargo
 * @package App\Models
 * @version August 4, 2017, 2:31 am -05
 *
 * @method static Cargo find($id=null, $columns = array())
 * @method static Cargo|\Illuminate\Database\Eloquent\Collection findOrFail($id, $columns = ['*'])
 * @property string key
 * @property string nombre
 * @property string observaciones
 */
class Cargo extends Model
{
use DatesTranslator, UserRelation;
    use SoftDeletes;

    public $table = 'cargos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'key',
        'nombre',
        'observaciones',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     */
    protected $casts = [
        'key' => 'string',
        'nombre' => 'string',
        'observaciones' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     */
    public static $rules = [
        'key' => 'required',
        'nombre' => 'required'
    ];

    public static $attributesCustom = [     
        
        'key' => 'llave interna',
           
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
