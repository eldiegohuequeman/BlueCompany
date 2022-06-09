@extends('layouts.app')

@auth 
@section('content')
<div class="container">
    <a class="btn btn-success" href="nuevoProducto">Nuevo Producto</a>
    <a class="btn btn-success" href="categorias">Ver Categorias</a>

    <div class="container mt-5 mb-5">
        <form method="POST" action="{{route('filtro')}}">
          @csrf  
          @method('POST')
          <label for="">Seleccione categoria</label> 
        <select name="categoria" id="">
          @foreach ($categorias as $cat)   
          <option value="{{$cat->id}}">{{$cat->nombre}}</option>
          @endforeach
        </select>
        <input type="submit" class="btn btn-primary" value="Filtrar">
      </form>
    </div>

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
            <th scope="col">Producto</th>
            <th scope="col">Valor</th>
            <th scope="col">Fecha Expiracion</th>
            <th scope="col">Categoria</th>
            <th scope="col">Aciones</th>
          </tr>
        </thead>
        @foreach ($productos as $producto)
        <tbody class="table-group-divider">
          <tr>
            <th>{{$producto->nombre}}</th>
            <th>{{$producto->valor}}</th>
            <th>{{$producto->fecha_expiracion}}</th>
            <td>
              <form method="POST" action="{{route('productoCategoria',$producto->id)}}">
                <button type="submit" class="btn btn-primary">Asignar</button>
                @csrf  
                @method('POST')
              </form>
            </td>
            <td>
                <a class="btn btn-warning" href="editarProducto/{{$producto->id}}">Editar</a>
                <form method="POST" onsubmit="return confirm('¿Estas seguro de eliminar este producto?')" action="{{route('deleteProducto',$producto->id)}}">
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
