<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ProductosController extends Controller
{
    public function productosAll()
    {
        $productos=DB::table('productos')->get();
        return view('/home', compact('productos'));   
    }

    public function editarProducto(Request $request, $id)
    {
        $producto=DB::table('productos')
        ->where('id',$id)
        ->first();
        
        return view('admin.updateFormProducto', compact('producto'));

    }

    public function updateProducto(Request $request, $id)
    {
    
      
            DB::table('productos')->where('id',$id)->update([
            'nombre' => $request->nombre,
            'valor'=>$request->valor]);

            $productos=DB::table('productos')->get();

            return redirect()->route('home',compact('productos'))
                     ->with('mensaje','Producto Actualizada con exito');
           
            
    }

    public function deleteProducto( $id)
    {
     
      
                
        DB::table('productos')
        ->where('id',$id)
        ->delete();

        DB::table('pro_cats')
        ->where('producto_id',$id)
        ->delete();

            $producto=DB::table('productos')->get();

        return redirect()
        ->route('home',compact('producto'))
        ->with('mensajeDelete','Producto eliminada con exito');
           
            
    }

    public function nuevoProducto()
    {
     
        return view('admin.insertFormProducto');
            
    }

    public function insertProducto(Request $request)
    {
        
        
        DB::table('productos')
        ->insert([
            "nombre"=>$request->categoria,
            "valor"=>$request->valor
        ]);

        
        $productos=DB::table('productos')->get();

        return redirect()
        ->route('home',compact('productos'))
        ->with('mensajeInsert','Producto registrado con exito');
           
    }

}
