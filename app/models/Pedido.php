<?php
namespace App\Models;

class Pedido extends \Illuminate\Database\Eloquent\Model {

    protected $table = 'pedidos';
    protected $fillable = ['cliente_id', 'conductor_id', 'fecha_entrega', 'hora_desde', 'hora_hasta', 'direccion'];

    public function cliente()
    {
        return $this->belongsTo('App\Models\Cliente');
    }

    public function conductor()
    {
        return $this->belongsTo('App\Models\Conductor');
    }
}