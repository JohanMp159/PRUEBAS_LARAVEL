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

    /**  @test*/
    public function verificarCantidadNegativa():void
    {
        $idPedido = 2;
        $idProducto = 3;
        $cantidad = -1;
        $precio = 20.4;

        $pedido = new Pedido();
        $resultado = $pedido->calcularDescuento($idPedido, $idProducto, $cantidad, $precio);
        $this->assertEquals("El precio no puede ser inferior o igual a cero", $resultado);
       
    }

    /**  @test*/
    public function verificarPrecioNegativo():void
    {
        $idPedido = 1;
        $idProducto = 2;
        $cantidad = 23.4;
        $precio = -1;

        $pedido = new Pedido();
        $resultado = $pedido->calcularDescuento($idPedido, $idProducto, $cantidad, $precio);
        $this->assertEquals("El precio no puede ser inferior o igual a cero", $resultado);
       
    }

    /**  @test*/
    public function verificarDescuentodel5_rango_inferior():void
    {
        $idPedido = 1;
        $idProducto = 2;
        $cantidad = 1;
        $precio = 200;
      
        $resultadoEsperado = ($cantidad * $precio) - ($cantidad * $precio * 0.05);

        $pedido = new Pedido();
        $resultado = $pedido->calcularDescuento($idPedido, $idProducto, $cantidad, $precio);
        $this->assertEquals($resultadoEsperado, $resultado);
       
    }

     /**  @test*/
     public function verificarDescuentodel5_rango_superior():void
     {
         $idPedido = 1;
         $idProducto = 2;
         $cantidad = 100;
         $precio = 200;
       
         $resultadoEsperado = ($cantidad * $precio) - ($cantidad * $precio * 0.05);
 
         $pedido = new Pedido();
         $resultado = $pedido->calcularDescuento($idPedido, $idProducto, $cantidad, $precio);
         $this->assertEquals($resultadoEsperado, $resultado);
        
     }

    /**  @test*/
     public function verificarDescuentodel10_rango_inferior():void
     {
         $idPedido = 1;
         $idProducto = 2;
         $cantidad = 101;
         $precio = 200;
       
         $resultadoEsperado = ($cantidad * $precio) - ($cantidad * $precio * 0.10);
 
         $pedido = new Pedido();
         $resultado = $pedido->calcularDescuento($idPedido, $idProducto, $cantidad, $precio);
         $this->assertEquals($resultadoEsperado, $resultado);
        
     }

     /**  @test*/
     public function VerificarDescuentodel10_rango_superior():void
     {
         $idPedido = 1;
         $idProducto = 2;
         $cantidad = 500;
         $precio = 200;
       
         $resultadoEsperado = ($cantidad * $precio) - ($cantidad * $precio * 0.10);
 
         $pedido = new Pedido();
         $resultado = $pedido->calcularDescuento($idPedido, $idProducto, $cantidad, $precio);
         $this->assertEquals($resultadoEsperado, $resultado);
        
     }

     /**  @test*/
     public function verificarDescuentodel12_rangoinferior():void
     {
         $idPedido = 1;
         $idProducto = 2;
         $cantidad = 501;
         $precio = 200;
       
         $resultadoEsperado = ($cantidad * $precio) - ($cantidad * $precio * 0.12);
 
         $pedido = new Pedido();
         $resultado = $pedido->calcularDescuento($idPedido, $idProducto, $cantidad, $precio);
         $this->assertEquals($resultadoEsperado, $resultado);
        
     }

     /**  @test*/
     public function verificarDescuentodel12_rangosuperior():void
     {
         $idPedido = 1;
         $idProducto = 2;
         $cantidad = 1000;
         $precio = 200;
       
         $resultadoEsperado = ($cantidad * $precio) - ($cantidad * $precio * 0.12);
 
         $pedido = new Pedido();
         $resultado = $pedido->calcularDescuento($idPedido, $idProducto, $cantidad, $precio);
         $this->assertEquals($resultadoEsperado, $resultado);
        
     }
    
     /**  @test*/
     public function VerificarDescuentodel13():void
     {
         $idPedido = 1;
         $idProducto = 2;
         $cantidad = 1001;
         $precio = 200;
       
         $resultadoEsperado = ($cantidad * $precio) - ($cantidad * $precio * 0.13);
 
         $pedido = new Pedido();
         $resultado = $pedido->calcularDescuento($idPedido, $idProducto, $cantidad, $precio);
         $this->assertEquals($resultadoEsperado, $resultado);
        
     }

}
