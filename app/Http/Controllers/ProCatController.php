<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class ProCatController extends Controller
{
    public function productoCategoria(Request $request , $id)
    {

        $categorias=DB::table('categorias')->get();

        $productos=DB::table('productos')
        ->where('id',$id)
        ->first();
        return view('admin.productosCategorias', compact('productos','categorias'));  
    }

    public function insertProductoCategoria(Request $request,$pro,$cat)
    {
        $esta=DB::table('pro_cats')
        ->select('producto_id','categoria_id')
        ->where('producto_id',$pro)
        ->where('categoria_id',$cat)
        ->count();

        if($esta>0){
           

            $productos=DB::table('productos')->get();
            return redirect()
        ->route('home',compact('productos'))
        ->with('mensajeInsert','Esta categoria ya esta asignada a este producto');

        }
        else{ 
        
            DB::table('pro_cats')
            ->insert([
                "producto_id"=>$pro,
                "categoria_id"=>$cat
            ]);
    
    
                 DB::table('productos')->where('id',$pro)->update([
                'fecha_expiracion' => $request->fecha]);
    
    
            
            $productos=DB::table('productos')->get();
    
            return redirect()
            ->route('home',compact('productos'))
            ->with('mensajeInsert','Categoria asignada correctamente');
        }
        
 /*      */
    }

    public function filtroCategoria(Request $request)
    {
       
        $productos=DB::connection("mysql")->select("
        SELECT productos.id, productos.nombre, productos.valor ,productos.fecha_expiracion, pro_cats.producto_id, pro_cats.categoria_id, categorias.nombre FROM pro_cats
        INNER JOIN productos ON pro_cats.producto_id = productos.id
        INNER JOIN  categorias ON  pro_cats.categoria_id = categorias.id
        WHERE pro_cats.categoria_id =$request->categoria");

        $categorias=DB::table('categorias')->get();
        return view('home', compact('productos','categorias'));  

    }
}
