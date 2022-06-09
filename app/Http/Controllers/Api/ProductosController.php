<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProductosController extends Controller
{
    public function apiAllProductos()
    {
        $productos=DB::table('productos')->get();
        return response($productos, 200);
    }

    public function apiCategoriaProductos(Request $request,$cat)
    {
        $productos=DB::connection("mysql")->select("
        SELECT productos.id, productos.nombre, productos.valor ,productos.fecha_expiracion, pro_cats.producto_id, pro_cats.categoria_id, categorias.nombre FROM pro_cats
        INNER JOIN productos ON pro_cats.producto_id = productos.id
        INNER JOIN  categorias ON  pro_cats.categoria_id = categorias.id
        WHERE pro_cats.categoria_id =$cat");

        return response($productos, 200);
    }

    public function apiProducto(Request $request , $pro)
    {
        $productos=DB::table('productos')
        ->where('id',$pro)
        ->get();
        return response($productos, 200);

    }
}
