<?php

namespace App\Models;

use App\Traits\DatesTranslator;
use App\Traits\UserRelation;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Obligacion
 * @package App\Models
 * @version August 4, 2017, 10:59 am -05
 *
 * @method static Obligacion find($id=null, $columns = array())
 * @method static Obligacion|\Illuminate\Database\Eloquent\Collection findOrFail($id, $columns = ['*'])
 * @property string item
 * @property string status
 */
class Obligacion extends Model
{
use DatesTranslator, UserRelation;
    use SoftDeletes;

    public $table = 'obligaciones';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'item',
        'status',
        'progress',
        'contrato_id',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     */
    protected $casts = [
        'item' => 'string',
        'status' => 'string',
        'progress' => 'integer',
        'contrato_id' => 'integer',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     */
    public static $rules = [
        'item' => 'required',
        'progress' => ''
    ];

    public static $attributesCustom = [     
        
        'item' => 'obligación especifica',
        'status' => 'estado',
        'progress' => 'progreso',
        'contrato_id' => 'contrato',
           
    ];

    /**
     * Relationship Models
     */
    
    public function contrato(){
        return $this->belongsTo('App\Models\Contrato');
    }      

    /**
     *  Ascensores & Mutadores
     */
}
