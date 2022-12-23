<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Mascotum extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'mascotas';

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
    protected $fillable = ['codigo', 'tipo_id', 'nombre', 'raza_id', 'color', 'f_nac', 'foto'];

    public function tipo(){
        return $this->belongsTo(Tipo::Class);
    }

    public function raza(){
        return $this->belongsTo(Raza ::Class);
    }


    
}
