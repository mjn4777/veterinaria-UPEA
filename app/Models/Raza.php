<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Raza extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'razas';

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
    protected $fillable = ['descrip'];

    public function mascotas(){
        return $this->hasMany(Mascota::class);
    }

    
}
