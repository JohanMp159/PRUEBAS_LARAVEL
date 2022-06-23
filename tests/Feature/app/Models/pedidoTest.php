<?php

namespace Tests\Feature\app\Models;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\Pedido;

class pedidoTest extends TestCase
{
    /**  @test*/
    public function verificarTiposDatos():void
    {
        $idPedido = "A";
        $idProducto = "B";
        $cantidad = 23.4;
        $precio = 20.14;

        $pedido = new Pedido();
        $resultado = $pedido->calcularDescuento($idPedido, $idProducto, $cantidad, $precio);
        $this->assertEquals("Datos incorrectos", $resultado);
       
    }
}
