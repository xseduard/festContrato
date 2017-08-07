<?php

namespace App\Models;

use App\Traits\DatesTranslator;
use App\Traits\UserRelation;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Natural
 * @package App\Models
 * @version August 3, 2017, 1:22 pm -05
 *
 * @method static Natural find($id=null, $columns = array())
 * @method static Natural|\Illuminate\Database\Eloquent\Collection findOrFail($id, $columns = ['*'])
 */
class Natural extends Model
{
use DatesTranslator, UserRelation;
    use SoftDeletes;

    public $table = 'naturales';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'cedula',
        'expedicion_mpio_id',
        'nombres',
        'apellidos',
        'genero',
        'direccion',
        'direccion_mpio_id',
        'email',
        'celular',
        'telefono',
        'observaciones',
        'status',
        'user_gen_id',
        'cargo_id',
        'faccion_id',
        'user_id'
    ];

    /**
     * The attributes that should be casted to native types.
     */
    protected $casts = [
        'cedula' => 'string',
        'expedicion_mpio_id' => 'integer',
        'nombres' => 'string',
        'apellidos' => 'string',
        'genero' => 'string',
        'direccion' => 'string',
        'direccion_mpio_id' => 'integer',
        'email' => 'string',
        'celular' => 'string',
        'telefono' => 'string',
        'observaciones' => 'string',
        'status' => 'string',
        'user_gen_id' => 'integer',
        'cargo_id' => 'integer',
        'faccion_id' => 'integer',
        'user_id' => 'integer'
    ];

    /**
     * Validation rules
     */
    public static $rules = [
        'cedula' => 'required',
        'expedicion_mpio_id' => 'required',
        'nombres' => 'required',
        'apellidos' => 'required',
        'genero' => 'required',
        'email' => 'email',
        'celular' => 'numeric'
    ];

    public static $attributesCustom = [     
        
        'cedula'             => 'cédula',
        'expedicion_mpio_id' => 'lugar de expedición',
        'direccion'          => 'dirección',
        'direccion_mpio_id'  => 'ciudad',
        'telefono'           => 'teléfono',
        'status'             => 'estado',
        'user_gen_id'        => 'usuario asignado',
        'cargo_id'           => 'cargo / relación / intervención',
        'faccion_id'         => 'Facción',
           
    ];

    /**
     * Relationship Models
     */
    
    // public function modelo(){
    //     return $this->belongsTo('App\Models\Modelo');
    // }  

    public function expedicion(){
        return $this->belongsTo('App\Models\Municipio', 'expedicion_mpio_id');
    }

    public function direccion_ciudad(){
        return $this->belongsTo('App\Models\Municipio', 'direccion_mpio_id');
    }
    public function cargo(){
        return $this->belongsTo('App\Models\Cargo');
    }

    public function faccion(){
        return $this->belongsTo('App\Models\Faccion');
    }

    public function contrato()
    {
        return $this->morphMany('App\Models\Contrato', 'contratable');
    }

    /**
     *  Ascensores & Mutadores
     */

    public function getFullNameAttribute()
    {
       return $this->nombres . ' ' . $this->apellidos;
    }
    public function getDocIdAttribute()
    {
       return $this->cedula;
    }    

    public function scopeSfullname($query, $text)
    {
        $text = trim($text);
        if (!empty($text)) {
            return $query->Where(function ($q) use ($text) {
                $q->where('nombres', 'LIKE', "%$text%")
                    ->orWhere('apellidos', 'LIKE', "%$text%");
            });
        }
    }

    public function scopeScedula($query, $cedula)
    {
        $cedula = trim($cedula);
        if (!empty($cedula)) {
            return $query->Where('cedula', 'LIKE', "%$cedula%");
        }
    }
    

    /**
     * Especial Functions
     */


}
