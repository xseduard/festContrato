<?php

namespace App\Repositories;

use App\Models\Cargo;
use App\Models\Faccion;
use App\Models\Municipio;
use App\Models\Natural;
use App\Models\Rubro;
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
    /**
     * Estaticos
     */
	public function generos()
    {
        return ['M' => 'Masculino', 'F' => 'Femenino', 'LGBTI' => 'LGBTI'];
    }

    public function naturalStatus()
    {
        return ['A' => 'Activo', 'I' => 'Inactivo'];
    }
    public function juridicoStatus()
    {
        return ['A' => 'Activo', 'I' => 'Inactivo'];
    }
    public function tipo_contrato()
    {
        return ['CPS' => 'Prestación de servicios', 'OTH' => 'Otros'];
    }
    public function tercero_type()
    {
        return ['App\Models\Natural' => 'Tercero Natural', 'App\Models\Juridico' => 'Tercero Jurídico'];
    }

    /**
     * Models select2
     */
    public function municipio_id()
    {        
            foreach (Municipio::with('departamento')->get()->toArray() as $key => $value) 
            {                         
                $array[$value['id']]=$value['nombre'].", ".$value['departamento']['nombre'];                
            }
        return ($array);
    }

    public function natural_id()
    {
        $modelo = Natural::all()->toArray();
            foreach ($modelo as $key => $value) {
                $array[$value['id']] = $value['cedula']." - ".$value['nombres']." ".$value['apellidos'];
            }
        return ($array);
    }

    public function natural_bycargo(array $cargos)
    {
        $array = [];
         $items = Natural::with('cargo')->whereHas('cargo', function ($query) use($cargos){                            
                                $query->whereIn('key', $cargos); 

                        })->get(); 
         foreach ($items as $item) {
             $array[$item->id] = $item->cedula." - ".$item->fullname." - ".$item->cargo->nombre;
         }
        return ($array);
    }

    public function cargo_id()
    {
       return Cargo::pluck('nombre', 'id');         
    }

    public function faccion_id()
    {
        return  Faccion::pluck('nombre', 'id');
    }
    public function rubro_id()
    {
        $array = [];
        $model = Rubro::get(['id', 'codigo', 'nombre', 'fecha_vigencia_inicio']);
           foreach ($model as $value) {
            $array[$value->id] = $value->codigo." - ".$value->nombre." ".$value->fecha_vigencia_inicio->year;
           }
        return $array;
    }


    /**
     * Configure the Model
     **/
    // public function model()
    // {
    //     return User::class;
    // }
}