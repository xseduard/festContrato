<?php  

namespace App\Traits;

use Jenssegers\Date\Date;

trait DatesLife
{
	   public function getFechaExpedicionAttribute($fecha_expedicion)
    {
        return new Date($fecha_expedicion);
    }
    public function getFechaVigenciaInicialAttribute($fecha_vigencia_inicio)
    {
        return new Date($fecha_vigencia_inicio);
    }
    public function getFechaVigenciaFinalAttribute($fecha_vigencia_final)
    {
        return new Date($fecha_vigencia_final);
    }
}