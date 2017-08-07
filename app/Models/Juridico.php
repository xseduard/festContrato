<?php

namespace App\Models;

use App\Traits\DatesTranslator;
use App\Traits\UserRelation;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Juridico
 * @package App\Models
 * @version August 3, 2017, 6:34 pm -05
 *
 * @method static Juridico find($id=null, $columns = array())
 * @method static Juridico|\Illuminate\Database\Eloquent\Collection findOrFail($id, $columns = ['*'])
 */
class Juridico extends Model
{
use DatesTranslator, UserRelation;
    use SoftDeletes;

    public $table = 'juridicos';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'nit',
        'nombre',
        'razon_social',
        'natural_id',
        'actividad',
        'direccion',
        'municipio_id',
        'celular',
        'telefono',
        'email',
        'observaciones',
        'status',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     */
    protected $casts = [
        'nit' => 'string',
        'nombre' => 'string',
        'razon_social' => 'string',
        'natural_id' => 'integer',
        'actividad' => 'string',
        'direccion' => 'string',
        'municipio_id' => 'integer',
        'celular' => 'string',
        'telefono' => 'string',
        'email' => 'string',
        'observaciones' => 'string',
        'status' => 'string',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     */
    public static $rules = [
        'nit' => 'numeric',
        'nombre' => 'required',
        'razon_social' => 'required',
        'municipio_id' => 'required',
        'celular' => 'numeric',
        'email' => 'email'
    ];

    public static $attributesCustom = [     
        
        'razon_social' => 'razón social',
        'natural_id'   => 'representate legal',
        'direccion'    => 'dirección',
        'municipio_id' => 'ciudad',
        'telefono'     => 'teléfono',
        'status'       => 'estado',
           
    ];

    /**
     * Relationship Models
     */

    public function natural(){
        return $this->belongsTo('App\Models\Natural');
    } 
    public function municipio(){
        return $this->belongsTo('App\Models\Municipio');
    }   
    public function contrato()
    {
        return $this->morphOne('App\Models\Contrato', 'contratable');
    } 

    

    /**
     *  Ascensores & Mutadores
     */

    public function getFullNameAttribute()
    {
       return $this->nombre;
    }
    public function getDocIdAttribute()
    {
       return $this->nit;
    } 
}
