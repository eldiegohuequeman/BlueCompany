<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class CategoriasController extends Controller
{
        /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */

    public function editarCategorias(Request $request, $id)
    {
        $categoria=DB::table('categorias')
        ->where('id',$id)
        ->first();
        
        return view('admin.updateFormCategoria', compact('categoria'));
    }

    public function categoriasAll()
    {
        $categorias=DB::table('categorias')->get(); 
        return view('admin.categorias', compact('categorias'));
    }

    public function updateCategoria(Request $request, $id)
    {
     
      
            DB::table('categorias')->where('id',$id)->update([
            'nombre' => $request->categoria]);

            $categorias=DB::table('categorias')->get();

            return redirect()->route('categorias',compact('categorias'))
                     ->with('mensaje','Categoria Actualizada con exito');
           
            
    }

    
    public function deleteCategoria( $id)
    {
     
      
                
        DB::table('categorias')
        ->where('id',$id)
        ->delete();

        DB::table('pro_cats')
        ->where('categoria_id',$id)
        ->delete();

            $categorias=DB::table('categorias')->get();

        return redirect()
        ->route('categorias',compact('categorias'))
        ->with('mensajeDelete','Categoria eliminada con exito');
           
            
    }

    public function nuevaCategoria()
    {
     
        return view('admin.insertFormCategoria');
            
    }

    public function insertCategoria(Request $request)
    {
        
        
        DB::table('categorias')
        ->insert([
            "nombre"=>$request->categoria
        ]);

        
        $categorias=DB::table('categorias')->get();

        return redirect()
        ->route('categorias',compact('categorias'))
        ->with('mensajeInsert','Categoria registrada con exito');
           
    }
}
