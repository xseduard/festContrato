<?php

namespace App\Repositories;

use App\Models\Municipio;
use App\User;
use InfyOm\Generator\Common\BaseRepository;
// use Prettus\Repository\Contracts\RepositoryInterface; viene por defecto en repositories

/**
 * Class RoleRepository
 * @package App\Repositories
 * @version August 1, 2017, 11:28 pm -05
 *
 * @method Role findWithoutFail($id, $columns = ['*'])
 * @method Role find($id, $columns = ['*'])
 * @method Role first($columns = ['*'])
*/
class CentralRepository //extends BaseRepository
{

	    public function generos()
    {
        return ['M' => 'Masculino', 'F' => 'Femenino', 'LGBTI' => 'LGBTI'];
    }

        public function naturalStatus()
    {
        return ['A' => 'Activo', 'I' => 'Inactivo'];
    }

    public function municipio_id()
    {        
            foreach (Municipio::with('departamento')->get()->toArray() as $key => $value) 
            {                         
                $array[$value['id']]=$value['nombre'].", ".$value['departamento']['nombre'];                
            }
        return ($array);
    }





    /**
     * Configure the Model
     **/
    // public function model()
    // {
    //     return User::class;
    // }
}