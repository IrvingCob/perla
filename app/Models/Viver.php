<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Viver extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'viver';

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
    protected $fillable = ['nombre', 'cantidad', 'precio', 'importe', 'fecha', 'proveedor_id'];

     public function proveedor()
    {
        return $this->belongsTo('App\Models\Proveedor', 'proveedor_id');
    }
}
