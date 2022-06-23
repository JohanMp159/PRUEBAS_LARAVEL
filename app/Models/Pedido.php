<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Pedido{
    private $idPedido;
    private $idProducto;
    private $cantidad;
    private $precio;

    public function calcularDescuento($idPedido, $idProducto, $cantidad, $precio){
        $tipoDatoIdPedido = gettype($idPedido);
        $tipoDatoIdProducto = gettype($idProducto);
        $tipoDatoCantidad = gettype($cantidad);
        $tipoDatoPrecio = gettype($precio);
        $subtotal = 0;
        $descuento = 0;

        if($tipoDatoIdPedido == 'integer' && $tipoDatoIdProducto == 'integer' &&
          ($tipoDatoCantidad == 'integer' || $tipoDatoCantidad == 'double'  ) &&
            ($tipoDatoPrecio == 'integer' || $tipoDatoPrecio == 'double')){
               
                if($cantidad <= 0){
                    return "La cantidad no puede ser inferior a cero";
                }
                else if($precio <= 0){
                    return "El precio no puede ser inferior a cero";
                }
                else if($cantidad > 0 && $cantidad <= 100){
                $descuento = 0.05;
                }
                else if($cantidad >100 && $cantidad <= 500){
                $descuento = 0.10;
                }
                else{
                    $descuento = 0.125;
                }

                if($precio < 0){
                    return "El precio no puede ser inferior o igual a cero";
                }

                $valorTotal = ($cantidad * $precio) - ($cantidad * $precio)*$descuento;
                return $valorTotal;
            }
            else{
                return "Datos incorrectos";
            }        
        }
}