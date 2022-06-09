@extends('layouts.app')

@auth 
@section('content')
<div class="container">
    <a class="btn btn-success" href="nuevaCategoria">Nuevo Categoria</a>
    <a class="btn btn-success" href="home">Ver Productos</a>
  
    @if ( session('mensaje') )
    <div class="alert alert-warning">{{ session('mensaje') }}</div>
    @endif
    @if ( session('mensajeDelete') )
    <div class="alert alert-danger">{{ session('mensajeDelete') }}</div>
    @endif
    @if ( session('mensajeInsert') )
    <div class="alert alert-primary">{{ session('mensajeInsert') }}</div>
    @endif
    <table class="table">
        <thead>
          <tr>
            <th scope="col">nombre</th>
          </tr>
        </thead>
        @foreach ($categorias as $data)
        <tbody class="table-group-divider">
          <tr>
            <th>{{$data->nombre}}</th>
           
            <td>
                <a class="btn btn-warning" href="editarCategorias/{{$data->id}}">Editar</a>
                <form method="POST" onsubmit="return confirm('¿Estas seguro de eliminar esta categoria?')" action="{{route('deleteCategoria',$data->id)}}">
                  <button type="submit" class="btn btn-danger">Eliminar</button>
                  @csrf  
                  @method('DELETE')
                </form>
            
            </td>
          </tr>
   
        </tbody>
        @endforeach
      </table>
</div>
@endsection
@endauth 
