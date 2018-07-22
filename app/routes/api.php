<?php
use App\Models\Pedido;
use App\Models\Cliente;
use App\Models\Conductor;

$app->group('/api', function() use ($app) {


    /* listado general */
    $app->get('/pedidos', function ($request, $response, $args) {
        $sth = $this->db->prepare('select p.id, p.direccion, p.fecha_entrega, p.hora_desde, p.hora_hasta, c.nombre, c.apellidos, c.telefono, c.email, co.nombre as conductor 
                                    from pedidos p 
                                    inner join clientes c on c.id = p.cliente_id
                                    inner join conductores co on co.id = p.conductor_id
                                    order by p.fecha_entrega desc');
        $sth->execute();
        $todos = $sth->fetchAll();
        return $this->response->withJson($todos);
        /*
        $todos = Pedido::all();
        return $this->response->withJson($todos);
        */
    });


    /* detalle */
    $app->get('/pedido/[{id}]', function ($request, $response, $args) {
        $todo = Pedido::where('id', $args['id']);
        return $this->response->withJson($todo->with('cliente')->with('conductor')->get());
    });


    /* alta de nuevo pedido */
    $app->post('/pedido', function ($request, $response) {
        $input = $request->getParsedBody();
        $cliente = Cliente::where('email', $input['email'])->first();

        if(!isset($cliente)){ // el cliente no esta registrado
            $cliente = Cliente::create([
                'nombre'=>$input['nombre'],
                'apellidos'=>$input['apellidos'],
                'email'=>$input['email'],
                'telefono'=>$input['telefono']
            ]);
        }

        $conductor = Conductor::inRandomOrder()->first(); // seleccionamos un conductor aleatorio
        $pedido = Pedido::create([
            'cliente_id'=>$cliente->id,
            'conductor_id'=>$conductor->id,
            'direccion'=>$input['direccion'],
            'fecha_entrega'=>$input['fecha_entrega'],
            'hora_desde'=>$input['hora_desde'],
            'hora_hasta'=>$input['hora_hasta']
        ]);

        return $this->response->withJson(true);
    });

});