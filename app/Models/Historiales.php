<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Historialess extends Model
{
    /**
     * The database table used by the model.
     *
     * @var string
     */
    protected $table = 'historiales';

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
    protected $fillable = ['fecha', 'cantidad', 'precio', 'importe', 'producto_id', 'proveedor_id', 'status_id'];

    public function producto()
    {
        return $this->belongsTo('App\Models\Producto', 'producto_id');
    }

    public function proveedor()
    {
        return $this->belongsTo('App\Models\Proveedor', 'proveedor_id');
    }

    public function status()
    {
        return $this->belongsTo('App\Models\Status', 'status_id');
    }
}
