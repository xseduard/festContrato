<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Triangle
 * @package App\Models
 * @version July 30, 2017, 8:40 am UTC
 */
class Triangle extends Model
{
    use SoftDeletes;

    public $table = 'triangles';
    

    protected $dates = ['deleted_at'];


    public $fillable = [
        'text',
        'numero',
        'parrafo'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'text' => 'string',
        'numero' => 'integer',
        'parrafo' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        'text' => 'required',
        'numero' => 'numeric'
    ];

    
}
