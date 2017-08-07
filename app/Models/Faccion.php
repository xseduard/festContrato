<?php

namespace App\Models;

use App\Traits\DatesTranslator;
use App\Traits\UserRelation;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Faccion
 * @package App\Models
 * @version August 4, 2017, 2:36 am -05
 *
 * @method static Faccion find($id=null, $columns = array())
 * @method static Faccion|\Illuminate\Database\Eloquent\Collection findOrFail($id, $columns = ['*'])
 * @property string key
 * @property string nombre
 * @property string observaciones
 */
class Faccion extends Model
{
use DatesTranslator, UserRelation;
    use SoftDeletes;

    public $table = 'faccions';
    

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
