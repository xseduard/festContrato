<?php

namespace App\Models;

use App\Traits\UserRelation;
use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Role
 * @package App\Models
 * @version August 1, 2017, 11:28 pm -05
 *
 * @method static Role find($id=null, $columns = array())
 * @method static Role|\Illuminate\Database\Eloquent\Collection findOrFail($id, $columns = ['*'])
 * @property string name
 * @property string display_name
 * @property string description
 * @property integer user_id
 */
class Role extends Model
{
    use SoftDeletes;
    use UserRelation;

    public $table = 'roles';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'name',
        'display_name',
        'description',
        'user_id'
    ];    
    protected $casts = [
        'name' => 'string',
        'display_name' => 'string',
        'description' => 'string',
        'user_id' => 'integer'
    ];
    
    public static $rules = [
        'name' => 'required|unique:roles',
        'display_name' => 'required'
    ];    

    public static $attributesCustom = [     
        'name' => 'llave interna',   
        'display_name' => 'nombre público',   
        'description' => 'descripción',    
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
