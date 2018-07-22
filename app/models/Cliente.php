<?php
namespace App\Models;

class Cliente extends \Illuminate\Database\Eloquent\Model {

    protected $table = 'clientes';
    protected $fillable = ['nombre', 'apellidos', 'email', 'telefono'];

    public function pedidos()
    {
        return $this->hasMany('App\Models\Pedido');
    }

}