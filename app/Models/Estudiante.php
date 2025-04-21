<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Estudiante extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'estudiantes';

    /**
    * The database primary key value.
    *
    * @var string
    */
    protected $primaryKey = 'id';

    /**
     * Attributes that should be mass-assignable.
     *
     * @var array
     */
    protected $fillable = ['nombre', 'nota_progreso_1', 'nota_progreso_2'];

        // Calcula minima_nota_progreso_3 en tiempo real
        public function getMinimaNotaProgreso3Attribute()
        {
            return round((120 - (5 * $this->nota_progreso_1) - (7 * $this->nota_progreso_2)) / 8, 2);
            
        }
   

    
}
