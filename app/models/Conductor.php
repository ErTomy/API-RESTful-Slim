<?php
namespace App\Models;


class Conductor extends \Illuminate\Database\Eloquent\Model {

    protected $table = 'conductores';
    protected $fillable = ['nombre', 'token'];

    public function pedidos()
    {
        return $this->hasMany('App\Models\Pedido');
    }
}
{

}